<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Spatie\LivewireWizard\Components\StepComponent;

class QuestionStep extends StepComponent
{
    public $question;
    public array|string $answers = [];

    public function mount()
    {
        throw_if(
            ! isset($this->questionStepSlug),
            'You must set the $questionStepSlug property to the slug of the question you want to display'
        );
        $this->question = Question::query()
            ->with('options')
            ->where('slug', $this->questionStepSlug)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.question-step');
    }

    public function validateSubmission()
    {
        // Most questions will have multiple answers
        // If the question only allows one answer
        // override this method in the question class
        $this->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|exists:options,id',
        ], [
            'answers.required' => 'Please select an answer',
            'answers.*.exists' => 'The selected option does not exist',
        ]);
    }

    public function getAnswerInstruction()
    {
        return $this->question->answer_instruction;
    }

    public function next()
    {
        $this->validateSubmission();
        $this->nextStep();
    }

    public function previous()
    {
        $this->previousStep();
    }

    public function submit()
    {
        $this->validateSubmission();
        $user = $this->registerUser();
        $submission = $this->createSubmission($user);
        // show a success message
        session()->flash('message', 'Your submission has been received');
        // redirect to the home page
        return redirect()->route('login');
    }

    public function registerUser(): User|Model
    {
        $investorTypeStep = $this->state()->forStepClass(InvestorTypeStep::class);
        $profileInfoStep = $this->state()->forStepClass(ProfileInfoStep::class);
        $additionalInfoStep = $this->state()->forStepClass(AdditionalInformationStep::class);

        return User::query()->updateOrCreate([
            'email' => $profileInfoStep['email'],
        ],[
            'first_name' => $profileInfoStep['firstName'],
            'last_name' => $profileInfoStep['lastName'],
            'email' => $profileInfoStep['email'],
            'password' => Hash::make($profileInfoStep['password']),
            'mobile_number' => $profileInfoStep['mobileNumber'],
            'type' => $investorTypeStep['investorType'],
            'country_id' => $profileInfoStep['countryId'],
            'referred_by' => $additionalInfoStep['referredBy'],
        ]);
    }

    public function createSubmission(User $user): Submission
    {
        /** @var Submission $submission */
        $submission = $user->submission()->create();
        $this->recordAnswer($submission, AccreditedInvestorStep::class);
        $this->recordAnswer($submission, QualifiedInvestorStep::class);
        $this->recordAnswer($submission, QualifiedClientStep::class);
        $this->recordAnswer($submission, NetWorthStep::class);
        $this->recordAnswer($submission, InvestmentAreaStep::class);
        $this->recordAnswer($submission, InvestmentAmountStep::class);
        $this->recordAnswer($submission, AdditionalInformationStep::class);

        return $submission;
    }

    public function recordAnswer(Submission $submission, string $questionStep)
    {
        $stepInfo = $this->state()->forStepClass($questionStep);
        collect(data_get($stepInfo, 'answers'))->each(function ($answerId) use ($submission, $stepInfo) {
            if (data_get($stepInfo, 'question')['type'] === 'textarea')
                $payload = [
                    'question_id' => data_get($stepInfo, 'question.id'),
                    'answer' => data_get($stepInfo, 'answers'),
                ];
            else
                $payload = [
                    'question_id' => data_get($stepInfo, 'question.id'),
                    'option_id' => $answerId,
                ];
            $submission->answers()->create($payload);
        });
    }
}
