<?php

use App\Http\Controllers\ClientController;
use App\Http\Livewire\ShowClients;
use App\Http\Livewire\ShowSchedules;
use App\Http\Livewire\Configuration;
use App\Http\Livewire\Finance;
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

    Route::get('/clients', ShowClients::class)->name('clients');
    Route::get('/agenda', ShowSchedules::class)->name('schedules');
    Route::get('/configuracoes', Configuration::class)->name('config');
    Route::get('/financeiro', Finance::class)->name('finance');

});
