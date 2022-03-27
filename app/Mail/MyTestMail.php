<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $lastName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$lastName)
    {
        $this->name = $name;
        $this->lastName = $lastName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.test')
        ->subject('این یک ایمیل تست می باشد.');
    }
}
