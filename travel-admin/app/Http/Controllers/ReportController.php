<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Booking;
use App\Models\User;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('report/data_report', compact('schedules'));
    }

    public function detail($schedule_id)
    {
        // Ambil semua jadwal untuk dropdown
        $schedules = Schedule::all();

        // Ambil daftar booking berdasarkan schedule_id
        $bookings = Booking::where('schedule_id', $schedule_id)->pluck('user_id');

        // Ambil daftar pengguna berdasarkan user_id dari booking
        $users = User::whereIn('id', $bookings)->get();

        return view('report.detail_report', compact('schedules', 'users', 'schedule_id'));
    }
}
