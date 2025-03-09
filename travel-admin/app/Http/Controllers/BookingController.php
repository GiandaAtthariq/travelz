<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $bookings = Booking::where('user_id', Auth::id())->get();
        $bookings = Booking::all();


        return view('booking/data_bookings', compact('bookings'));
    }

    // Menampilkan form untuk membuat booking baru
    public function create()
    {
        // $schedule = Schedule::findOrFail($schedule_id);
        $schedules = Schedule::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        return view('booking/create_bookings', compact('schedules', 'users'));
    }

    // Menyimpan booking ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|numeric',
            'schedule_id' => 'required|numeric',
            'booking_date' => 'required|date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        // Ambil jadwal berdasarkan schedule_id
        $schedule = Schedule::find($request->schedule_id);

        // Pastikan jadwal ada
        if (!$schedule) {
            return back()->with('error', 'Jadwal tidak ditemukan.');
        }

        // Cek apakah passenger_count sudah mencapai passenger_quota
        if ($schedule->passenger_count >= $schedule->passenger_quota) {
            return back()->with('error', 'Kuota sudah penuh!');
        }

        // Buat booking baru
        $booking = Booking::create([
            'user_id' => $request->user_id, // Gunakan dari request
            'schedule_id' => $request->schedule_id,
            'booking_date' => $request->booking_date,
            'total_price' => $schedule->price,
            'status' => 'pending',
        ]);

        // Jika booking berhasil dibuat, tambahkan passenger_count
        if ($booking) {
            $schedule->increment('passenger_count');
        }

        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil dibuat!');
    }

    // Menampilkan detail booking
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }
    public function edit(Booking $booking)
    {
        $schedules = Schedule::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        return view('booking/edit_bookings', compact('booking', 'users', 'schedules'));
    }

    // Memperbarui data jadwal
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'schedule_id' => 'required|numeric',
            'booking_date' => 'required|date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);
        $schedule = Schedule::find($request->schedule_id);

        // Pastikan jadwal ada
        if (!$schedule) {
            return back()->with('error', 'Jadwal tidak ditemukan.');
        }

        // Cek apakah passenger_count sudah mencapai passenger_quota
        if ($schedule->passenger_count >= $schedule->passenger_quota) {
            return back()->with('error', 'Kuota sudah penuh!');
        }

        // $booking->update($request->all());
        $booking->update([
            'user_id' => $request->user_id,
            'schedule_id' => $request->schedule_id,
            'booking_date' => $request->booking_date,
            'total_price' => $request->total_price,
            'status' => $request->status,

        ]);
        if ($booking) {
            $schedule->increment('passenger_count');
        }

        return redirect()->route('bookings.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    // Membatalkan booking
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== 'cancelled') {
            // Kembalikan kuota penumpang
            $schedule = Schedule::findOrFail($booking->schedule_id);
            $schedule->passenger_quota += 1;
            $schedule->save();

            // Update status booking
            $booking->status = 'cancelled';
            $booking->save();
        }

        return redirect()->route('bookings.index')->with('success', 'Pemesanan berhasil dibatalkan!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        //     return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus!');

    }
}
