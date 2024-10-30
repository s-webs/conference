<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function about($conferenceId)
    {
        $conference = Conference::findOrFail($conferenceId);
        return view('pages.conference.about', compact('conference'))
            ->with('conferenceId', $conference->id);
    }
}
