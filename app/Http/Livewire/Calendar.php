<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    //public $days = array();
    public $month;
    public $monthname;
    public $predays;
    public $days;


    public function days($month)
    {
        $this->monthname = $this->getMonthName($month);
        $this->predays = $this->addDaysPreviouse($month);
        $this->days = $this->getDaysforCurrentMonth($month);
    }


    public function getDaysinMonth($month)
    {
        $date1 = Carbon::createFromFormat('m/d/Y', $month . '/01/2022');
        return $date1->daysInMonth;
    }


    public function getMonthName($month)
    {
        $date1 = Carbon::createFromFormat('m/d/Y', $month . '/01/2022');
        return $date1->englishMonth;
    }


    public function getDaysforCurrentMonth($month)
    {
        $resultdaysinmonth = $this->getDaysinMonth($month);

        for ($count = 1; $count <= $resultdaysinmonth; $count++) {

            $date = Carbon::createFromFormat('m/d/Y', $month . '/' . $count . '/2022');
            $days[$count] = $date->englishDayOfWeek . ' ' . $date;
            //echo($count.$days[$count].' ');
        }

        return $days;
    }

    public function addDaysPreviouse($month)
    {
        $date1 = Carbon::createFromFormat('m/d/Y', $month . '/01/2022');
        $name = $date1->englishDayOfWeek;

        $dayspreviouse = 0;
        switch ($name) {
            case 'Monday':
                $dayspreviouse = 0;
                break;
            case 'Tuesday':
                $dayspreviouse = 1;
                break;
            case 'Wednesday':
                $dayspreviouse = 2;
                break;
            case 'Thursday':
                $dayspreviouse = 3;
                break;
            case 'Friday':
                $dayspreviouse = 4;
                break;
            case 'Saturday':
                $dayspreviouse = 5;
                break;
            case 'Sunday':
                $dayspreviouse = 6;
                break;
        }


        $getpreviousemonthdays = $this->getDaysinMonth($month - 1);
        for ($count = ($getpreviousemonthdays - $dayspreviouse) + 1; $count <= $getpreviousemonthdays; $count++) {
            $date = Carbon::createFromFormat('m/d/Y', ($month - 1) . '/' . $count . '/2022');
            $predays[$count] = $date->englishDayOfWeek . ' ' . $date;
        }
        return $predays;
    }

    public function previouseMonth(){
        $this->month--;
        $this->days($this->month);
        ($this->month.'Previouse');

    }


    public function nextMonth(){
        $this->month++;
        $this->days($this->month);
        echo($this->month.'Next');


    }


    public function render()
    {
        $this->days($this->month);
        return view('livewire.calendar');
    }
}
