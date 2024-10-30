<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $conference = Conference::query()->where('is_active', true)->first();

        return view('pages.home.index', compact('conference'));
    }
}
