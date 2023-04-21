<?php

namespace App\Mail\Confirm;

use App\Models\Temporary;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Account extends Mailable
{
    use Queueable, SerializesModels;
    private $temporary;

    /**
     * Create a new message instance.
     */
    public function __construct(Temporary $temporary)
    {
        $this->temporary = $temporary;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->temporary->login . ' - Verifique sua conta → ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.confirm.account',
            with: [
                'temporary' => $this->temporary
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
        return [];
    }
}