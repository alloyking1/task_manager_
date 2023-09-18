<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
// use App\Notifications\ProjectInviteNotification;
use App\Notifications\TestingNotification;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Notification::send(Auth::user(), new ProjectInviteNotification(['name' => 'moses', 'body' => 'this is the notification body']));
    // Notification::send(Auth::user(), new TestingNotification(['name' => 'notificatioin', 'body' => 'the notification body']));
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/task')->group(function () {
    Route::get('/', TaskController::class)->name('task.index');
    // Route::post('/save/{id?}', [TaskController::class, 'createOrUpdate'])->name('task.create');
    // Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
    // Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('task.delete');
});

require __DIR__ . '/auth.php';
