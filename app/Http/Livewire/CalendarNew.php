<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class CalendarNew extends Component
{
    public $day;
    public $month;
    public $year;

    //stuff view need

    public $today;
    public $monthname;
    public $onemonth;


    public function days()
    {
        $this->monthname = $this->getMonthName($this->month);
        $this->buildOneMonth();
    }

    public function today()
    {
        if (!isset($this->today)) {
            $this->today = Carbon::now();
        }

        $this->day = $this->today->day;
        $this->month = $this->today->month;
        $this->year = $this->today->year;
    }

    public function buildOneMonth()
    {
        $this->onemonth = null;
        $predays = $this->getDaysPreviousetMonth($this->month);
        if (isset($predays)) {
            foreach ($predays as $preday) {
                $this->onemonth[] = $preday;
            }
        }
        $days = $this->getDaysCurrentMonth($this->month);
        foreach ($days as $day) {
            $this->onemonth[] = $day;
        }

    }

    public function getDaysCurrentMonth($month)
    {
        $daysinmonth = $this->getDaysinMonth($month);
        for ($count = 1; $count <= $daysinmonth; $count++) {
            $date = $this->createDate($month, $this->year, $count);
            $days[$count] = 'cur ' . $date->shortEnglishDayOfWeek . ' ' . $date;
        }
        return $days;
    }


    public function getDaysPreviousetMonth($month)
    {
        $date = $this->createDate($month, $this->year, 1);
        $dayspreviouse = $this->getDaysFromPreviouseMonth($date->englishDayOfWeek);
        $getpreviousemonthdays = $this->getDaysinMonth($month - 1);
        for ($count = ($getpreviousemonthdays - $dayspreviouse) + 1; $count <= $getpreviousemonthdays; $count++) {
            $date = $this->createDate($month - 1, $this->year, $count);
            $predays[$count] = 'pre ' . $date->shortEnglishDayOfWeek  . ' ' . $date;
        }

        if (isset($predays)) {
            return $predays;
        }
    }


    public function getDaysFromPreviouseMonth($name)
    {
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
        return $dayspreviouse;
    }

    public function getDaysinMonth($month)
    {
        $date = $this->createDate($month, $this->year, 1);
        return $date->daysInMonth;
    }

    public function createDate($month, $year, $day)
    {
        $date = Carbon::createFromFormat('m/d/Y', $month . '/' . $day . '/' . $year);
        return $date;
    }

    public function getMonthName($month)
    {
        $date = $this->createDate($month, $this->year, 1);
        return $date->englishMonth;
    }



    //click Functions


    public function previouseMonth()
    {
        if ($this->month != 1) {
            $this->month--;
        } else {
            $this->month = 12;
            $this->year--;
        }
        $this->days();
    }



    public function nextMonth()
    {

            if($this->month!=12){
                $this->month++;
                }
                else{
                    $this->month = 1;
                    $this->year++;
                }

            $this->days($this->month);



    }


    public function render()
    {
        if(!isset($this->today)){
            $this->today();
        }
        $this->days();
        return view('livewire.calendar-new');
    }
}