<?php

namespace App\Livewire;

class NetWorthStep extends QuestionStep
{
    protected string $questionStepSlug = 'current-net-worth';

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
