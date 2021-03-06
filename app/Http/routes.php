<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

/*
|--------------------------------------------------------------------------
| Calendar Routes
|--------------------------------------------------------------------------
*/
Route::get('/calendar/{month}/{year}', 'CalendarController@renderCalendar');

/*
|--------------------------------------------------------------------------
| Appointment Routes
|--------------------------------------------------------------------------
*/

Route::get('/appointments/{day}', 'AppointmentController@getDaysAppointments'); 	  
Route::get('/appointment/{appointment}', 'AppointmentController@getAppointment'); 	 
//Route::put('/appointment/{id}/{data}')   // Updates an appointment
Route::post('/appointment/', 'AppointmentController@createAppointment'); 
//Route::delete('/appointment/{id}')       // Deletes an appointment