<?php

use Illuminate\Support\Facades\Route;

// Import Controller
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');