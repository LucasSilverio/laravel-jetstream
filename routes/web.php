<?php

use App\Http\Controllers\ClientController;
use App\Http\Livewire\ShowClients;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

//    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::get('/clients', ShowClients::class)->name('clients');

});
