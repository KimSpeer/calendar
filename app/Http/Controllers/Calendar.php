<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Calendar extends Controller
{

    //public $days = array();


   public function days($month){

        $monthname = $this->getMonthName($month);
        $predays = $this->addDaysPreviouse($month);
        $days = $this->getDaysforCurrentMonth($month);


        return view('components.headcalendar')
        ->with('predays',$predays)
        ->with('days', $days)
        ->with('monthname',$monthname);
    }





   public function getDaysinMonth($month){
    $date1 = Carbon::createFromFormat('m/d/Y', $month.'/01/2022');
    return $date1->daysInMonth;
   }


   public function getMonthName($month){
    $date1 = Carbon::createFromFormat('m/d/Y', $month.'/01/2022');
    return $date1->englishMonth;
   }


   public function getDaysforCurrentMonth($month){
    $resultdaysinmonth = $this->getDaysinMonth($month);

    for($count = 1; $count<=$resultdaysinmonth;$count++){

        $date = Carbon::createFromFormat('m/d/Y', $month.'/'.$count.'/2022');
        $days[$count] = $date->englishDayOfWeek.' '.$date;
        //echo($count.$days[$count].' ');
        }

        return $days;
   }

   public function addDaysPreviouse($month)
   {
        $date1 = Carbon::createFromFormat('m/d/Y', $month.'/01/2022');
        $name= $date1->englishDayOfWeek;

        $dayspreviouse = 0;
        switch ($name) {
            case 'Monday':
                $dayspreviouse =0;
                break;
            case 'Tuesday':
                $dayspreviouse =1;
                break;
            case 'Wednesday':
                $dayspreviouse =2;
                break;
            case 'Thursday':
                $dayspreviouse =3;
                break;
            case 'Friday':
                $dayspreviouse =4;
                break;
            case 'Saturday':
                $dayspreviouse =5;
                break;
            case 'Sunday':
                $dayspreviouse =6;
                break;
        }


        $getpreviousemonthdays = $this->getDaysinMonth($month-1);
        for($count = ($getpreviousemonthdays-$dayspreviouse)+1; $count<=$getpreviousemonthdays;$count++){
            $date = Carbon::createFromFormat('m/d/Y', ($month-1).'/'.$count.'/2022');
            $predays[$count] = $date->englishDayOfWeek.' '.$date;
            }
        return $predays;
   }


}
