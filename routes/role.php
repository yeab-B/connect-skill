<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;


Route::get('roles/', [RoleController::class, 'index'])->name('roles.index');
Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
// Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::match(['PUT', 'PATCH'], '/roles/{role}', [RoleController::class, 'update'])->name('roles.update');

// Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::patch('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::resource('permissions', PermissionController::class)->except(['create', 'show']);
Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
Route::patch('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
