<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;


// Route::middleware('api')->group(function () {
//     Route::get('/api/bookings', [BookingController::class, 'index']);  // Ambil semua booking
//     Route::post('/api/bookings', [BookingController::class, 'store']); // Tambah booking baru
// });

Route::get('/', function () {
    return view('homepage');
});
// Route::get('/edit_schedule', function () {
//     return view('edit_schedule');
// });
// Route::get('/schedule', function () {
//     return view('schedule');
// });
Route::resource('schedules', ScheduleController::class);
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
Route::delete('/schedules/delete/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

Route::resource('bookings', BookingController::class);
// Route::get('/bookings/create/{booking}', [BookingController::class, 'create'])->name('bookings.create');
Route::get('/booking/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/delete/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');


Route::resource('payments', PaymentController::class);
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('/payments/delete/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');

Route::resource('reports', ReportController::class);
// Route::get('/reports/{report}', [ReportController::class, 'detail'])->name('reports.detail');
Route::get('/report/detail/{schedule_id}', [ReportController::class, 'detail'])->name('reports.detail');
