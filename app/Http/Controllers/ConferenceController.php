<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantEmailVerification;
use App\Models\Conference;
use App\Models\Participant;
use App\Models\RegistrationField;
use App\Models\RegistrationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ConferenceController extends Controller
{
    public function about($conferenceId)
    {
        $conference = Conference::findOrFail($conferenceId);
        return view('pages.conference.about', compact('conference'))
            ->with('conferenceId', $conference->id);
    }

    public function gallery($conferenceId)
    {
        $conference = Conference::query()->findOrFail($conferenceId);
        return view('pages.conference.gallery', compact('conference'));
    }

    public function register($conferenceId)
    {
        $conference = Conference::query()->findOrFail($conferenceId);
        $registrationTypes = $conference->registrationTypes;

        return view('registration.index', compact('conference', 'registrationTypes'));
    }

    public function form($conferenceId, $formId)
    {
        $conference = Conference::query()->findOrFail($conferenceId);
        $form = RegistrationType::query()->findOrFail($formId);

        return view('registration.form', compact('conference', 'form'));
    }

    public function store($conferenceId, $formId, Request $request)
    {
        $data = [];
        $email = $request->input('Email');
        $registrationTypeId = $formId;

        // Проверка на существующего участника с тем же email для данного типа регистрации
        $existingParticipant = Participant::query()->where('registration_type_id', $registrationTypeId)
            ->where('email', $email)
            ->first();

        if ($existingParticipant) {
            return redirect()->back()->withErrors(['msg' => 'Участник с этим email уже зарегистрирован на данный тип регистрации.']);
        }

        // Перебираем все введенные пользователем данные
        foreach ($request->all() as $field_name => $value) {
            if ($field_name === '_token') {
                continue;
            }

            // Проверяем, является ли поле загрузкой файла
            if ($request->hasFile($field_name)) {
                $file = $request->file($field_name);
                $path = $file->store('conferences/uploads', 'public');
                $data[$field_name] = $path;
            } else {
                $data[$field_name] = $value;
            }
        }

        $participant = new Participant();
        $participant->registration_type_id = $registrationTypeId;
        $participant->email = $email;
        $participant->additional_data = $data;
        $participant->save();

        // Отправка письма подтверждения
        Mail::to($email)->send(new ParticipantEmailVerification($participant));

        return redirect()->back()->with('success', 'Регистрация прошла успешно! Проверьте ваш email для подтверждения.');
    }

    protected function sendConfirmationEmail(Participant $participant)
    {
        $confirmationLink = route('participants.confirm', ['id' => $participant->id]);

        Mail::send('emails.confirmation', ['participant' => $participant, 'link' => $confirmationLink], function ($message) use ($participant) {
            $message->to($participant->email)
                ->subject('Подтверждение регистрации');
        });
    }

    public function confirm($id)
    {
        $participant = Participant::query()->findOrFail($id);

        if ($participant->isEmailVerified()) {
            return response()->json([
                'message' => 'Email уже подтвержден.',
            ]);
        }

        $participant->update(['email_verified_at' => now()]);

        return response()->json([
            'message' => 'Email успешно подтвержден.',
        ]);
    }

    public function verifyEmail(Request $request, Participant $participant)
    {
        // Проверяем, что email еще не подтвержден
        if (!$participant->isEmailVerified()) {
            // Сохраняем метку времени подтверждения
            $participant->email_verified_at = now();
            $participant->save();

            return redirect()->route('home.index')->with('success', 'Ваш email успешно подтвержден!');
        }

        return redirect()->route('home.index')->with('info', 'Ваш email уже был подтвержден.');
    }

}
