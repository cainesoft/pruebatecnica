<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\UserComponent;

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/Usuarios', UserComponent::class)->name('userComponent');

