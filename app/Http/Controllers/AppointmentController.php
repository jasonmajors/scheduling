<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AppointmentRepository;

class AppointmentController extends Controller
{
    /**
     * The appointment repository instance.
     *
     * @var TaskRepository
     */
    protected $appointmentRepo;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AppointmentRepository $appointmentRepo)
    {
        $this->appointmentRepo = $appointmentRepo;

        //$this->middleware('auth');
        //$this->middleware('subscribed');
    }


    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {
        return view('home');
    }

    public function renderCalendar(int $month, int $year)
    {
        // Set max month value to 12
        $month = ($month > 12) ? $month = 12 : $month = $month;

        $nextCalendar   = $this->appointmentRepo->getNextCalendar($month, $year);
        $nextMonth      = $nextCalendar['nextMonth'];
        $nextYear       = $nextCalendar['nextYear'];
        $calendarMarkup = $this->appointmentRepo->renderCalendar($month, $year);

        return view('calendar.calendar', [
                'month'         => $month, 
                'year'          => $year,
                'nextMonth'     => $nextMonth,
                'nextYear'      => $nextYear, 
                'calendarMarkup'=> $calendarMarkup
        ]);
    }
}