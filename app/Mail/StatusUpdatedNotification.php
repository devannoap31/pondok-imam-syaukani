<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusUpdatedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $registrationCode;
    public string $newStatus;

    public function __construct(string $name, string $registrationCode, string $newStatus)
    {
        $this->name = $name;
        $this->registrationCode = $registrationCode;
        $this->newStatus = $newStatus;
    }

    public function build(): self
    {
        return $this->subject('Status Pendaftaran Anda Telah Diperbarui')
            ->view('emails.status_updated_notification')
            ->with([
                'name' => $this->name,
                'registrationCode' => $this->registrationCode,
                'newStatus' => $this->newStatus,
            ]);
    }
}
