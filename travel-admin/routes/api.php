<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\SheduleController;

Route::get('/bookings', [BookingController::class, 'index']);  // Ambil semua booking
Route::post('/bookings', [BookingController::class, 'store']); // Tambah booking baru

Route::get('/schedules', [SheduleController::class, 'index']);  // Ambil semua booking
Route::post('/schedules', [SheduleController::class, 'store']); // Tambah booking baru

// Tambah booking baru
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
