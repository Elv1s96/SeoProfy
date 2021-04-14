<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $text;

    /**
     * SendMail constructor.
     * @param $name
     * @param $text
     */
    public function __construct($name,$text)
    {
        $this->name = $name;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail',['name' => $this->name,'text' => $this->text]);
    }
}
