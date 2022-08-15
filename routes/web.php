<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->prefix('chat')->name('chat.')->group(function() {
    Route::get('/', [ChatController::class, 'index'])->name('index');
    Route::get('/create', [ChatController::class, 'create'])->name('create');
    Route::post('/create', [ChatController::class, 'store'])->name('store');
    Route::put('/update', [ChatController::class, 'update'])->name('update');
    Route::post('/join', [ChatController::class, 'join'])->name('join');
    Route::post('/leave', [ChatController::class, 'leave'])->name('leave');
    Route::delete('/delete', [ChatController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
