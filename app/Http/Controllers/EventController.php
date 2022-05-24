<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public $event;


    public function mount(Event $event){
        if(isset($$event)){
            $this->$event = $$event;
        } else {
            $this->$event = new Event;
        }
    }


    public function saveEvent($subject, $eventStart, $eventEnd){
        $this->event->id = $this->event->id();
        if(!isset($this->event->id)){
        }

        dd('already here');
        $this->event->save();
    }
}
