<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Calendar;
use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/calendar', function () {
    return view('calendar');
});




Route::get('/days', [Calendar::class, 'days']);
Route::get('/event', [Calendar::class, 'event']);
Route::get('/new', [Calendar::class, 'new']);
Route::get('/drag', [Calendar::class, 'drag']);


Route::get('test', [\App\Http\Controllers\DeveloperController::class, 'index']);
Route::get('package', [\App\Http\Controllers\Calendar::class, 'package']);
Route::get('dragpackage', [\App\Http\Controllers\DeveloperController::class, 'dragpackage']);






