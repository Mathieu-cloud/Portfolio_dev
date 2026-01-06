<?php

use App\Http\Controllers\ProjetController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/admins/projects/create', [ProjetController::class, 'create'])
    ->name('admins.projects.create')
    ->middleware('auth', 'verified');

Route::post('/admins/projects', [ProjetController::class, 'store'])
    ->name('admins.projects.store')
    ->middleware('auth', 'verified');

Route::get('/admins/projects/edit/{id}', [ProjetController::class, 'edit'])
    ->name('admins.projects.edit')
    ->middleware('auth', 'verified');

Route::put('/admins/projects/update/{id}', [ProjetController::class, 'update'])
    ->name('admins.projects.update')
    ->middleware('auth', 'verified');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
