<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Spatie\LivewireWizard\Components\StepComponent;

class InvestorTypeStep extends StepComponent
{
    public string|null $investorType = null;

    public function render()
    {
        $investorTypes = [
            [
                'slug' => "individual",
                'name' => 'Individual',
                'description' => 'I would like to invest on behalf of myself, my family, or my company.'
            ],
            [
                'slug' => "institutional",
                'name' => 'Institutional',
                'description' => 'I would like to invest on behalf of an institution or advisory clients (endowments, pensions, RIAS, etc).'
            ],
            [
                'slug' => 'individual_institutional',
                'name' => 'Individual & Institutional',
                'description' => 'I would like to invest on behalf of myself and as an institutional investor or for my advisory clients.'
            ]
        ];

        return view('livewire.investor-type-step', compact('investorTypes'));
    }

    public function next()
    {
        $validated = $this->validate([
            'investorType' => 'required',
        ]);

        // Call next step
        $this->nextStep();
    }
}
