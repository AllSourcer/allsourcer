<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptanceNotif extends Mailable
{
    use Queueable, SerializesModels;

     public $mailContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $mailContent)
    {
         $this->mailContent = $mailContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notification')
                    ->subject(isset($this->mailContent['subject'])?$this->mailContent['subject']:'Allsourcer Notification')
                    // ->from($this->mailContent['email'])
                    ->with('mailContent', $this->mailContent);
    }
}