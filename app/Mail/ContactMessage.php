<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public string $fullName;
    public string $email;
    public string $whatsapp;
    public string $messageContent;

    public function __construct(string $fullName, string $email, string $whatsapp, string $messageContent)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->whatsapp = $whatsapp;
        $this->messageContent = $messageContent;
    }

    public function build(): self
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo(config('mail.from.address'), config('mail.from.name'))
            ->subject('Pesan Kontak Baru dari Website')
            ->view('emails.contact_message')
            ->with([
                'fullName' => $this->fullName,
                'email' => $this->email,
                'whatsapp' => $this->whatsapp,
                'messageContent' => $this->messageContent,
            ]);
    }
}
