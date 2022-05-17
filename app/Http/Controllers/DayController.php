<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DayController extends Controller

{
    public function generateDays($dayspermonth, $firstdayoftheweek){
        $count=1;
        while($count!=$dayspermonth){

            $count++;
        }

    }
}
