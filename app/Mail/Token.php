<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Token extends Mailable
{
    use Queueable, SerializesModels;

    private $user, $assunto, $conteudo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $assunto, $conteudo)
    {
        $this->user = $user;
        $this->assunto = $assunto;
        $this->conteudo = $conteudo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->assunto);
        $this->to($this->user->email, $this->user->name);
        return $this->view('mail.token', ['user' => $this->user, 'conteudo' => $this->conteudo]);
    }
}
