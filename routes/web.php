<?php

use App\Http\Controllers\MessageController;
use App\Models\Project;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::get('/favicon.ico', function () {
    return Response::file(public_path('favicon.ico'));
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // numero totale dei progetti
    $totalProjects = Project::count();

    // numero totale dei messaggi
    $totalMessages = Message::count();
    
    return view('dashboard', compact('totalProjects', 'totalMessages'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects', ProjectController::class);
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('message.show');
});





require __DIR__.'/auth.php';
