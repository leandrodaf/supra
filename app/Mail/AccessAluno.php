<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccessAluno extends Mailable
{
    use Queueable, SerializesModels;


    protected $nome;
    protected $email;
    protected $dataNascimento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome, $email, $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->dataNascimento = $senha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("Seja Bem Vindo - Educandário Anjinho Feliz")
            ->view('emails.accessAluno')
            ->with([
            'name' => $this->nome,
            'email' => $this->email,
            'senha' => $this->dataNascimento,
        ]);
    }
}
