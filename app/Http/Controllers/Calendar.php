<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Calendar extends Controller
{

    //public $days = array();


   public function days($month){
    $date1 = Carbon::createFromFormat('m/d/Y', $month.'/01/2022');

    $resultdaysinmonth = $date1->daysInMonth;

        $days[0]=$month;
        echo($days[0].' ');
    for($count = 1; $count<=$resultdaysinmonth;$count++){

        $date = Carbon::createFromFormat('m/d/Y', $month.'/'.$count.'/2022');
        $days[$count] = $date->englishDayOfWeek;
        echo($count.$days[$count].' ');
    }
    return view('components.headcalendar', $days);
   }
}
