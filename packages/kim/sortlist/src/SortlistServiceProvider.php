<?php

namespace KimSpeer\Sortlist;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;

class SortlistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'sortlist');
        Livewire::component('kim:sort', Sort::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
