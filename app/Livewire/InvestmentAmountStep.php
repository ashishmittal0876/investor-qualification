<?php

namespace App\Livewire;

class InvestmentAmountStep extends QuestionStep
{
    protected string $questionStepSlug = 'investment-amount';

    public function validateSubmission()
    {
        $this->validate([
            'answers' => ['required', 'exists:options,id'],
        ], [
            'answers.required' => 'Please select an answer',
            'answers.exists' => 'The selected option does not exist',
        ]);
    }
}
