<?php

Route::get('cal', function(){
	echo 'Calendar';
});

Route::get('', 'KimSpeer\Calendar\CalendarController@calendar');
