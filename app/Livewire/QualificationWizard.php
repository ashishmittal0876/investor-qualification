<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\LivewireWizard\Components\WizardComponent;

class QualificationWizard extends WizardComponent
{
    public function steps(): array
    {
        return [
            InvestorTypeStep::class,
            ProfileInfoStep::class,
            AccreditedInvestorStep::class,
            QualifiedInvestorStep::class,
            QualifiedClientStep::class,
            NetWorthStep::class,
            InvestmentAreaStep::class,
            InvestmentAmountStep::class,
            AdditionalInformationStep::class,
        ];
    }
}
