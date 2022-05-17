<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Calendar extends Controller
{
   public function days(){
    $date1 = Carbon::createFromFormat('m/d/Y H:i:s', '2/01/2022 10:20:00');


    $resultmonth = $date1->englishMonth;
    $resultdaysinmonth = $date1->daysInMonth;
    $resultdayoftheweek = $date1->englishDayOfWeek;


    dd($resultmonth.' '.$resultdayoftheweek.' Days:'.$resultdaysinmonth);
   }
}
