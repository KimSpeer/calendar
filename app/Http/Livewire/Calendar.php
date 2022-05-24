<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Calendar extends Component
{
    //public $days = array();
    public $day;
    public $year;
    public $month;
    public $monthname;

    public $predays;
    public $days;
    public $today;

    public $events;
    public $openmodal= true;
    public $show = false;

    public $subject;
    public $startEvent;
    public $endEvent;
    public $body;

    public $count;
    public $nom;


    protected $rules = [
        'subject' => 'required|max:20',

    ];

    protected $listeners = [
    'show' => 'show'
    ];

    public function show()
    {
    $this->show = true;
    }


    public function days()
    {
        $this->monthname = $this->getMonthName($this->month);
        $this->predays = $this->addDaysPreviouse($this->month);
        $this->days = $this->getDaysforCurrentMonth($this->month);

        $this->nom = DB::table('events')->get();
    }


    public function getDaysinMonth($month)
    {
        $date = $this->createDate($month,$this->year,1);
        return $date->daysInMonth;
    }


    public function getMonthName($month)
    {
        $date = $this->createDate($month,$this->year,1);
        return $date->englishMonth;
    }


    public function getDaysforCurrentMonth($month)
    {
        $resultdaysinmonth = $this->getDaysinMonth($month);

        for ($count = 1; $count <= $resultdaysinmonth; $count++) {

            $date = $this->createDate($month,$this->year,$count);
            $days[$count] = $date->englishDayOfWeek . ' ' . $date;
            //echo($count.$days[$count].' ');
        }

        return $days;
    }

    public function addDaysPreviouse($month)
    {
        $date = $this->createDate($month,$this->year,1);

        $name = $date->englishDayOfWeek;

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
        for ($count = ($getpreviousemonthdays - $dayspreviouse) + 1; $count <= $getpreviousemonthdays; $count++)
        {
            $date = $this->createDate($month-1,$this->year,$count);
            $predays[$count] = $date->englishDayOfWeek . ' ' . $date;
        }

            if(isset($predays)){
                return $predays;
            }
    }


    public function previouseMonth(){
        if($this->month!=1){
        $this->month--;
        }
        else{
            $this->month = 12;
            $this->year--;
        }

        $this->days();
        ($this->month.'Previouse');


    }


    public function nextMonth(){
        if($this->month!=12){
            $this->month++;
            }
            else{
                $this->month = 1;
                $this->year++;
            }

        $this->days($this->month);

    }

    public function today(){
        if(!isset($this->today)){
            $this->today=Carbon::now();
        }
        $this->day = $this->today->day;
        $this->month = $this->today->month;
        $this->year = $this->today->year;
    }

    public function oneClickEvent(){
        $this->openmodal=true;
    }

    public function addEvent(){
        $this->events[$this->count] = $this->startEvent.$this->endEvent.$this->subject.'/'.$this->body;
        $this->count++;

        DB::table('events')->insert([
            'subject' => $this->subject,
            'eventStart' => $this->startEvent,
            'eventEnd' => $this->endEvent,
            'body' =>$this->body
        ]);

    }


    public function render()
    {
        if(!isset($this->day)){
            $this->today();
        }
        $this->days();
        return view('livewire.calendar');
    }


    public function createDate($month, $year,$day){
        $date= Carbon::createFromFormat('m/d/Y', $month . '/' . $day . '/'.$year);
        return $date;
    }
}
