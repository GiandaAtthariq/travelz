<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'schedule')->get();

        return response()->json([
            'message' => 'Data booking berhasil diambil',
            'data' => $bookings
        ], 200);
    }
}
