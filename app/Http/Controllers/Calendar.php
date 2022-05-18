<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Calendar extends Controller
{

    //public $days = array();


   public function days($month,$year){
        return view('components.headcalendar')
        ->with('month',$month)
        ->with('year',$year);
    }






}
