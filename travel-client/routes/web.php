<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/detail', [ScheduleController::class, 'detail'])->name('schedule.detail');
