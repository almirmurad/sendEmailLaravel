<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $client;

    /**
     * Create a new message instance.
     */
    public function __construct(User $client)
    {
        //
        $this->client = $client;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

          
            from: new Address('no-reply@webmurad.com.br', 'no-reply'),
            replyTo:[
                new Address('almir_murad@hotmail.com', 'Almir Murad'),

            ],
            subject: 'Assunto do email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            html: 'Mail.RegisterMail',
            with:[
                'nome'=>$this->client->name,
                'idade'=>$this->client->idade,
            ]

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(__DIR__.'/../../public/ABOBORA.jpg')
                                ->as('teste.jpg')
                                ->withMime('image/jpg'),
        ];
    }
}
