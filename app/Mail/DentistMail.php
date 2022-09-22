<?php

namespace App\Mail;

use App\Models\Dentist;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DentistMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dentists;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dentists)
    {
        $this->dentists = $dentists;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.dentists');
    }
}
