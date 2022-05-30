<?php

namespace KimSpeer\Calendar;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;


class CalendarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('KimSpeer\Calendar\CalendarController');
        $this->loadViewsFrom(__DIR__.'/views', 'calendar');

        Livewire::component('component-test', Calendar::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }
}
