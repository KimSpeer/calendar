<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Calendar extends Controller
{

    //public $days = array();


   public function days(){
        return view('components.headcalendar');
    }

    public function event(){
        return view('components.newevent');

    }

    public function new(){
        return view('components.newcalendar');
    }

    public function package(){
        return view('kim:calendar');
    }

}
