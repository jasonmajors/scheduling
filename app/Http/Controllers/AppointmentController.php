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
}