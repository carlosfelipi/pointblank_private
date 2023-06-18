<?php

namespace App\Mail\Forgot;

use App\Models\Account;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Password extends Mailable
{
    use Queueable, SerializesModels;

    private $player;
    
    public function __construct(Account $player)
    {
        $this->player = $player;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->player->login . ' - Cadastrar nova senha → '
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.forgot.password',
            with: [
                'player' => $this->player
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
