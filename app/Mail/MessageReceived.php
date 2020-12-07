<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    //definimos el valor del  asunto (ya usa la variable $subject por defecto)
    public $subject = 'Mensaje recibido';

    //definimos una varible publica $msg en la cual el constructor le passa el contenido del email
    public $msg; 
    //importante este variable no puede ser $message ya que es una variable reservada de Laravel, y no nos mostrada el contenido correctamente

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message-received');
    }
}
