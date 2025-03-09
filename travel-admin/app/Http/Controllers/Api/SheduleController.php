<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class SheduleController extends Controller
{
    public function index()
    {
        // $schedules = Schedule::with('user')->get();
        $schedules = Schedule::all();
        return response()->json([
            'message' => 'Data schedule berhasil diambil',
            'data' => $schedules
        ], 200);
    }
}
