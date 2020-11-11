<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailUser extends Mailable
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

        $subject = 'Criação de novo usuario no programa Corredores Digitais';
        $route = 'painel';

        $url_curso = '';
        if ($this->data['user']['profile'] == 'Empreendedor') {
            $is_criacao = ($this->data['startup']['category'] == 'criação');

            $url_curso =
                ($is_criacao) ? 
                'https://corredoresdigitais.teachable.com/p/curso-preparatorio-criacao-de-negocios' :
                'https://corredoresdigitais.teachable.com/p/curso-preparatorio-tracao-de-negocios' ;

            $subject = 'Seu projeto foi habilitado para a Etapa de Atratividade do Corredores Digitais';
            $route = 'user.painel.view';
        }


        return $this->from('contato@corredoresdigitais.info')
                    ->subject($subject)
                    ->view('emails/emailresposta')
                    ->with([
                        'data' => $this->data,
                        'url_painel' => route($route),
                        'url_curso'  => $url_curso,
                    ]);
    }
}
