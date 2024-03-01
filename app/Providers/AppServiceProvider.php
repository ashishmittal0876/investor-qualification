<?php

namespace App\Providers;

use App\Livewire\InvestorTypeStep;
use App\Livewire\QualificationWizard;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the Livewire components
        Livewire::component('qualification-wizard', QualificationWizard::class);
        Livewire::component('investor-type-step', InvestorTypeStep::class);
    }
}
