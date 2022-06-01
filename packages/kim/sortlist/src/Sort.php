<?php

namespace KimSpeer\Sortlist;

use Livewire\Component;

class Sort extends Component
{
    public $things = [
        ['id' => 1, 'title' => 'Do Dishes'],
        ['id' => 2, 'title' => 'Dust Shelves'],
        ['id' => 3, 'title' => 'Clean Counters'],
        ['id' => 4, 'title' => 'Fold Laundry'],
        ['id' => 5, 'title' => 'Scrub Toilet'],

    ];

    public function reorder($orderedIds)
    {
        $this->things = collect($orderedIds)->map(function ($id){
            return collect($this->things)->where('id',(int)$id)->first();
        })->toArray();

    }

    public function render()
    {
        return view('sortlist::livewire.sort');
    }
}
