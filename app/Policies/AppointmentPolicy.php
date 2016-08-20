<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Appointment;

class AppointmentPolicy
{
    use HandlesAuthorization;


    /**
     * Determine if the given user can delete the given appointment.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */
    public function delete(User $user, Appointment $appointment)
    {
        return $user->id === $appointment->user;
    }



    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
