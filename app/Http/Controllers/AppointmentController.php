<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use App\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function getAppointment($id)
    {
        dd(Appointment::find($id));
    }

    public function getDaysAppointments(Day $day)
    {
        dd($day->appointments);
    }

    public function createAppointment(Request $request)
    {
        $this->validate($request, [
            'start_time' => 'required',
            'end_time'   => 'required'
        ]);

        $start_time = $request->input('start_time');
        $end_time   = $request->input('end_time');
        $email      = 'jmajors@test.com';
        $day_id     = 2;
        $first_name = 'Jas';
        $last_name  = 'Majors';

        Appointment::create(compact(
            'start_time', 
            'end_time', 
            'email', 
            'day_id', 
            'first_name', 
            'last_name'
            )
        );
        
/*        $appointment = new Appointment;
        $appointment->start_time = $start_time;
        $appointment->end_time   = $end_time;
        $appointment->first_name = $first_name;
        $appointment->last_name  = $last_name;
        $appointment->email      = $email;
        $appointment->day_id     = $day_id;
        $appointment->save();*/

        // CHECK FOR AVAILABILITY
        
        //$date       = Carbon::parse($start_time);
        // Load the day object of the appointment
       // $day = Day::where('date', '=', $date)->first();
        // Get the other appointments for the day
        // Check for overlap
        // No overlap? Submit
       // dd($start_time);
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        //
    }

    public function deleteAppointment(Request $request, Appointment $appointment)
    {
        $this->authorize('delete', $appointment);
        $appointment->delete();
        // Redirect somewhere
        return redirect('');
    }
}