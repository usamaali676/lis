<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LandingPageMail extends Mailable
{
    public $data;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->data['subject'];
        return $this->markdown('emails.LandingPage')
        ->subject($subject)
        ->with([
            'data'=>$this->data
        ]);
    }
}
