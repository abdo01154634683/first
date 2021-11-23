<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $title='';
    public $content='';
    public function __construct($title,$content)
    {
        $this->title=$title;
        $this->content=$content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*
         * return $this->view('emails.mail')->with($title)->with($content); not this is wrong because $title
         * and $content not viewable but i want send data to view the data will be viewable to view
         * because the build function will take view code and site it in your self
        */
        return $this->view('emails.mail');
    }
}
