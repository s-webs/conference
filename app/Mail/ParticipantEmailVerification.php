<?php

namespace App\Mail;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class ParticipantEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function build()
    {
        // Создаем временную ссылку для подтверждения
        $verificationUrl = URL::temporarySignedRoute(
            'participants.verify',
            Carbon::now()->addMinutes(60),
            ['participant' => $this->participant->id]
        );

        return $this->subject('Подтверждение вашего email для участия в конференции')
            ->view('emails.confirmation')
            ->with(['verificationUrl' => $verificationUrl]);
    }
}
