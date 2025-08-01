<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Category Pages
    Volt::route('categories', 'categories.index')->name('categories.index'); // index + includes result
    Volt::route('categories/view/{category}', 'categories.view')->name('categories.view'); // read/view
    Volt::route('categories/manage/{category?}', 'categories.form')->name('categories.manage'); // form used for both create/edit

    // Skill Pages
    Volt::route('skills', 'skills.index')->name('skills.index');
    Volt::route('skills/view/{skill}', 'skills.view')->name('skills.view');
    Volt::route('skills/manage/{skill?}', 'skills.form')->name('skills.manage');

    // Role Management
    Volt::route('roles', 'roles.index')->name('roles.index');
    Volt::route('roles/view/{role}', 'roles.view')->name('roles.view');
    Volt::route('roles/manage/{role?}', 'roles.form')->name('roles.manage');

    // Permission Management
    Volt::route('permissions', 'permissions.index')->name('permissions.index');
    Volt::route('permissions/view/{permission}', 'permissions.view')->name('permissions.view');
    Volt::route('permissions/manage/{permission?}', 'permissions.form')->name('permissions.manage');
});

// Booking Routes (customer & admin)
Route::middleware(['auth'])->prefix('bookings')->name('bookings.')->group(function () {
    Volt::route('/', 'bookings.index')->name('index');
    Volt::route('view/{booking}', 'bookings.view')->name('view');
    Volt::route('manage/{booking?}', 'bookings.form')->name('manage');
});

require __DIR__.'/auth.php';
