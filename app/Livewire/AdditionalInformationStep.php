<?php

namespace App\Livewire;

class AdditionalInformationStep extends QuestionStep
{
    protected string $questionStepSlug = 'additional-information';
    protected string $answerInstruction = '(e.g, LinkedIn profile, investing experience, or goals)';

    public string $referredBy = '';

    public function getAnswerInstruction()
    {
        return $this->answerInstruction;
    }

    public function validateSubmission()
    {
        $this->validate([
            'answers' => ['required'],
        ], [
            'answers.required' => 'Please provide additional information',
        ]);
    }
}
