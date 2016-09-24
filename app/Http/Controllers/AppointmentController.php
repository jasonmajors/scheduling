<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use App\Appointment;
use App\Repositories\DayRepository;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    protected $dayRepo;


    public function __construct(DayRepository $dayRepo)
    {
        $this->dayRepo = $dayRepo;
    }


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
        $first_name = 'Jas';
        $last_name  = 'Majors';
        // Check for appointment availability
        $date = date('Y-m-d', strtotime($start_time));
        // TODO: Need something to handle when day doesnt exist
        $day = Day::where('date', '=', $date)->first();
        $day_id = $day->id;

        $apptStart = Carbon::parse($start_time);
        $apptEnd = Carbon::parse($end_time);
        
        $available = $this->dayRepo->checkAvailability($day, $apptStart, $apptEnd);

        if ($available) {
            Appointment::create(compact(
                'start_time', 
                'end_time', 
                'email', 
                'day_id', 
                'first_name', 
                'last_name'
                )
            );
        } else {
            // Do something here
        }
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        // Not yet... patience...
    }

    public function deleteAppointment(Request $request, Appointment $appointment)
    {
        $this->authorize('delete', $appointment);
        $appointment->delete();
        // Redirect somewhere
        return redirect('');
    }
}