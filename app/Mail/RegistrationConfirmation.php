<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $registrationCode;
    public string $status;

    public function __construct(string $name, string $registrationCode, string $status)
    {
        $this->name = $name;
        $this->registrationCode = $registrationCode;
        $this->status = $status;
    }

    public function build(): self
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo(config('mail.from.address'), config('mail.from.name'))
            ->subject('Konfirmasi Pendaftaran Santri Baru')
            ->view('emails.registration_confirmation')
            ->with([
                'name' => $this->name,
                'registrationCode' => $this->registrationCode,
                'status' => $this->status,
            ]);
    }
}
