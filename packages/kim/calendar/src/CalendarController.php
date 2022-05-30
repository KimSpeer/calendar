<?php

namespace KimSpeer\Calendar;

use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function calendar()
    {
        return view('calendar::app');
    }
}
