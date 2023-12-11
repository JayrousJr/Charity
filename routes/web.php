<?php

use App\Models\News;
use App\Models\User;
use App\Models\About;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\VolunteerController;
use App\Models\SocialNet;

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

Route::get('/', function () {
    $news = News::orderBy('created_at', 'desc')->get();
    $social = SocialNet::all();
    $volunteer = User::all()->whereIn('is_volunteer', ['1']);
    return view('/site/index', compact('volunteer', 'news', 'social'));
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('contact', [MessageController::class, 'index'])->name('contact.index');

    Route::post('send', [MessageController::class, 'store'])->name('contact.store');
    Route::get('redirect', [MessageController::class, 'redirect'])->name('contact.redirect');

    Route::post('make-volunteer', [VolunteerController::class, 'store'])->name('volunteer');
});
