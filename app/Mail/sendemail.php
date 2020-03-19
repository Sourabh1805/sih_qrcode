<?php

namespace App\Mail;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendemail extends Mailable
{
    use Queueable, SerializesModels;
      public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    //  print_r($data);

        return $this->from('john@webslesson.info')->subject('NEW FILE ADDED')->view('dynamic_email_template');
        print_r("hii");
        exit();
    }
}
