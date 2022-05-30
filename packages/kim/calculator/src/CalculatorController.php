<?php

namespace KimSpeer\Calculator;

use App\Http\Controllers\Controller;

class CalculatorController extends Controller
{
    //
    public function add($a, $b){
        $result = $a + $b;
        return view('calculator::app', compact('result'));
    }

    public function subtract($a, $b){
    	echo $a - $b;
        return view('calculator::app', compact('result'));
    }
}
