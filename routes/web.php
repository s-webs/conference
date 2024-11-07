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
Route::get('/conference-details/{conferenceId}', [\App\Http\Controllers\ConferenceController::class, 'about'])->name('conference.about');
Route::get('/conference-details/{conferenceId}/gallery', [\App\Http\Controllers\ConferenceController::class, 'gallery'])->name('conference.gallery');
Route::get('/conference-news/{articleSlug}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
