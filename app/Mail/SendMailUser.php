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
        return $this->from('contato@corredoresdigitais.info')
                    ->subject('Aprovação da primeira fase')
                    ->view('emails/emailresposta')
                    ->with([
                        'data' => $this->data,
                        'url_painel' => route('user.painel.view'),
                    ]);
    }
}
