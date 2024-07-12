<?php

use Illuminate\Support\Facades\Route;

// Import Controller
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomTypeController;

Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
Route::post('/admin/delete', [AdminController::class, 'destroy'])->name('admin.admin.delete');

// User Routes
Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
Route::post('/admin/user/delete', [UserController::class, 'destroy'])->name('admin.user.delete');

// Room Type Routes
Route::get('/admin/roomtype', [RoomTypeController::class, 'index'])->name('admin.roomType.index');
Route::get('/admin/roomtype/create', [RoomTypeController::class, 'create'])->name('admin.roomType.create');
Route::post('/admin/roomtype/store', [RoomTypeController::class, 'store'])->name('admin.roomType.store');
Route::get('/admin/roomtype/edit/{id}', [RoomTypeController::class, 'edit'])->name('admin.roomType.edit');
Route::post('/admin/roomtype/update/{id}', [RoomTypeController::class, 'update'])->name('admin.roomType.update');
Route::post('/admin/roomtype/delete', [RoomTypeController::class, 'destroy'])->name('admin.roomType.delete');

// Rooms Routes
Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
Route::post('/admin/rooms/store', [RoomController::class, 'store'])->name('admin.rooms.store');
Route::get('/admin/rooms/edit/{id}', [RoomController::class, 'edit'])->name('admin.rooms.edit');
Route::post('/admin/rooms/update/{id}', [RoomController::class, 'update'])->name('admin.rooms.update');
Route::post('/admin/rooms/delete', [RoomController::class, 'destroy'])->name('admin.rooms.delete');