<?php

use Illuminate\Support\Facades\Route;

// Improt Auth Controller
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

// Import Controller
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomTypeController;

// Import Member Controller
use App\Http\Controllers\Member\MemberDashboardController;
use App\Http\Controllers\Member\MemberBookingController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('AuthCheck')->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Admin Routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
    Route::post('/admin/delete', [AdminController::class, 'destroy'])->name('admin.admin.delete');

    // User Routes
    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::post('/user/delete', [UserController::class, 'destroy'])->name('admin.user.delete');

    // Room Type Routes
    Route::get('/roomtype', [RoomTypeController::class, 'index'])->name('admin.roomType.index');
    Route::get('/roomtype/create', [RoomTypeController::class, 'create'])->name('admin.roomType.create');
    Route::post('/roomtype/store', [RoomTypeController::class, 'store'])->name('admin.roomType.store');
    Route::get('/roomtype/edit/{id}', [RoomTypeController::class, 'edit'])->name('admin.roomType.edit');
    Route::post('/roomtype/update/{id}', [RoomTypeController::class, 'update'])->name('admin.roomType.update');
    Route::post('/roomtype/delete', [RoomTypeController::class, 'destroy'])->name('admin.roomType.delete');

    // Rooms Routes
    Route::get('/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/rooms/store', [RoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/rooms/edit/{id}', [RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::post('/rooms/update/{id}', [RoomController::class, 'update'])->name('admin.rooms.update');
    Route::post('/rooms/delete', [RoomController::class, 'destroy'])->name('admin.rooms.delete');
});

Route::middleware('AuthCheck')->prefix('user')->group(function () {
    // Dashboard
    Route::get('/dashboard', [MemberDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/dashboard/room/detail/{id}', [MemberDashboardController::class, 'roomDetail'])->name('user.roomDetail');
    Route::post('/dashboard/room/book', [MemberBookingController::class, 'book'])->name('user.book');
});