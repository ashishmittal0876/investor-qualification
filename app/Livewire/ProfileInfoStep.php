<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Spatie\LivewireWizard\Components\StepComponent;

class ProfileInfoStep extends StepComponent
{
    public string|null $firstName = null;
    public string|null $lastName = null;
    public string|null $mobileNumber = null;
    public string|null $email = null;
    public string|null $password = null;
    public string $password_confirmation = '';
    public int|null $countryId = null;

    public function render()
    {
        $countries = Country::all();

        return view('livewire.profile-info-step', compact('countries'));
    }

    public function next()
    {
        $validated = $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'mobileNumber' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'countryId' => 'required|exists:countries,id',
        ]);

        // Call next step
        $this->nextStep();
    }

    public function previous()
    {
        // Call previous step
        $this->previousStep();
    }
}
