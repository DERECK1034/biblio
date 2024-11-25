<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class notificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $nuevaclave;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario,$nuevaclave)
    {
        $this->usuario = $usuario;
       $this->nuevaclave = $nuevaclave;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('joshua.diaz1822@uppuebla.edu.mx', 'Dereck Downham'),
            subject: 'Informacion de Contacto',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'recupera',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
