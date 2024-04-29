<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckPlanMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $plan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($plan)
    {
        $this->plan = $plan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.CheckPlanMail');
    }
}
