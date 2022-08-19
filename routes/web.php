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

Route::middleware(['auth'])->prefix('chat')->name('chat.')->group(function() {
    Route::get('/', [ChatController::class, 'index'])->name('index');
    Route::get('/create', [ChatController::class, 'create'])->name('create');
    Route::get('/{room}', [ChatController::class, 'join'])->name('show');
    Route::post('/store', [ChatController::class, 'store'])->name('store');
    Route::delete('/{room}/delete', [ChatController::class, 'destroy'])->name('delete');

    Route::get('/{room}/get_messages', [ChatController::class, 'getMessages']);
    Route::post('/{room}/push', [ChatController::class, 'push_message'])->name('push');
});

require __DIR__.'/auth.php';