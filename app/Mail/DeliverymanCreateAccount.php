<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeliverymanCreateAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $deliveryman;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deliveryman)
    {
        $this->deliveryman = $deliveryman;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.create-account.deliveryman');
    }
}
