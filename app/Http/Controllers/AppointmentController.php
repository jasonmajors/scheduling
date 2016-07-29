<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AppointmentRepository;

class AppointmentController extends Controller
{
    /**
     * The appointment repository instance.
     *
     * @var AppointmentRepository
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


    /**
    * Render the HTML calendar for a given month and year value
    *
    * @param int $month
    * @param int $year
    * @return Reponse
    */
    public function renderCalendar(int $month, int $year)
    {
        // Set max month value to 12
        $month = ($month > 12) ? $month = 12 : $month = $month;

        $linkDates = $this->appointmentRepo->getNextAndPrevCalendar($month, $year);

        $nextMonth      = $linkDates['nextMonth'];
        $nextPagesYear  = $linkDates['nextPagesYear'];
        $prevMonth      = $linkDates['prevPagesMonth'];
        $prevPagesYear  = $linkDates['prevPagesYear'];

        $calendarMarkup = $this->appointmentRepo->renderCalendar($month, $year);

        return view('calendar.calendar', [
                'month'         => date('F', mktime(0,0,0, $month, 1, $year)),
                'year'          => $year,
                'nextMonth'     => $nextMonth,
                'nextPagesYear' => $nextPagesYear, 
                'prevPagesMonth'=> $prevMonth,
                'prevPagesYear' => $prevPagesYear,
                'calendarMarkup'=> $calendarMarkup
        ]);
    }  


}