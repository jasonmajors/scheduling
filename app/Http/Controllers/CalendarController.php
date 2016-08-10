<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CalendarRepository;

class CalendarController extends Controller
{
    /**
     * The calendar repository instance.
     *
     * @var CalendarRepository
     */
    protected $calendarRepo;


    /**
     * The day repository instance.
     *
     * @var DayRepository
     */
    protected $dayRepo;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CalendarRepository $calendarRepo, DayRepository $dayRepo)
    {
        $this->calendarRepo = $calendarRepo;
        $this->dayRepo      = $dayRepo;

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
        $availableTime = [];
        // Set max month value to 12
        $month = ($month > 12) ? $month = 12 : $month = $month;

        $days = $this->dayRepo->loadDaysInMonth($month, $year);

        foreach ($days as $day) {
            $availableTime[$day] = $this->dayRepo->getAvailableTime($day);
        }

        $linkDates = $this->calendarRepo->getNextAndPrevCalendar($month, $year);

        $nextMonth      = $linkDates['nextMonth'];
        $nextPagesYear  = $linkDates['nextPagesYear'];
        $prevMonth      = $linkDates['prevPagesMonth'];
        $prevPagesYear  = $linkDates['prevPagesYear'];

        $calendarMarkup = $this->calendarRepo->renderCalendar($month, $year);

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