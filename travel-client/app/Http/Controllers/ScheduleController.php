<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input tujuan dan tanggal dari request
        $destination = $request->input('destination');
        $date = $request->input('date');

        // Ambil data dari API Laravel Admin
        $response = Http::get('http://127.0.0.1:8000/api/schedules');
        $schedules = json_decode($response->body());

        // Filter data jika form dikirim
        if ($destination || $date) {
            $filteredSchedules = array_filter($schedules->data, function ($schedule) use ($destination, $date) {
                $matchesDestination = $destination ? $schedule->destination == $destination : true;
                $matchesDate = $date ? date('Y-m-d', strtotime($schedule->departure_time)) == $date : true;

                return $matchesDestination && $matchesDate;
            });
        } else {
            $filteredSchedules = [];
        }

        // Kirim data ke view
        return view('schedule/index', ['schedules' => $filteredSchedules]);
    }
    public function detail()
    {

        return view('schedule/details');
    }
}
