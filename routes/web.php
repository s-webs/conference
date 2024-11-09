<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/register/conference-{conferenceId}', [\App\Http\Controllers\ConferenceController::class, 'register'])->name('conference.register');
Route::get('/register/conference-{conferenceId}/form-{formId}', [\App\Http\Controllers\ConferenceController::class, 'form'])->name('conference.form');
Route::post('/register/conference-{conferenceId}/form-{formId}/store', [\App\Http\Controllers\ConferenceController::class, 'store'])->name('conference.store');
Route::get('/conference-details/{conferenceId}', [\App\Http\Controllers\ConferenceController::class, 'about'])->name('conference.about');
Route::get('/conference-details/{conferenceId}/gallery', [\App\Http\Controllers\ConferenceController::class, 'gallery'])->name('conference.gallery');
Route::get('/conference-news/{articleSlug}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');


Route::get('/participants/verify/{participant}', [\App\Http\Controllers\ConferenceController::class, 'verifyEmail'])
    ->name('participants.verify')
    ->middleware('signed');


Route::get('mail', function () {
    return view('emails.confirmation');
});
