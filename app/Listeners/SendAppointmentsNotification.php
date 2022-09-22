<?php

namespace App\Listeners;

use App\Events\WelcomeUser;
use App\Mail\DentistMail;
use App\Mail\TestMail;
use App\Models\Dentist;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAppointmentsNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\WelcomeUser  $event
     * @return void
     */
    public function handle(WelcomeUser $event)
    {
        Mail::to($event->dentists->email)->send(new DentistMail($event->dentists->name));
    }
}
