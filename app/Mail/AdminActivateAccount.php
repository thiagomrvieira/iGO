<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminActivateAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $partner;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($partner, $user)
    {
        $this->partner = $partner;
        $this->user    = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.activate-account.partner');
    }
}
