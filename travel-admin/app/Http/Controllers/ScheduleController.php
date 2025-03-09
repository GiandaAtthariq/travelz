<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule/data_schedule', compact('schedules'));
    }
    // Menampilkan form tambah jadwal
    public function create()
    {
        
        return view('schedule/create_schedule');
    }

    // Menyimpan jadwal baru ke database
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'departure_time' => 'required|date',
            'passenger_quota' => 'required|integer|min:1',
            'image' => 'nullable|string|max:255', // Tidak wajib diisi
        ]);

        // Simpan ke database
        Schedule::create($validatedData);

        // Redirect ke halaman daftar jadwal
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    // Menampilkan detail jadwal tertentu
    public function show(Schedule $schedule)
    {
        return view('schedule/edit_schedule', compact('schedule'));
    }

    // Menampilkan form edit jadwal
    public function edit(Schedule $schedule)
    {
        return view('schedule/edit_schedule', compact('schedule'));
    }

    // Memperbarui data jadwal
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'departure_time' => 'required|date',
            'passenger_quota' => 'required|integer|min:1',
            'image' => 'required|string|max:255',
        ]);

        // $schedule->update($request->all());
        $schedule->update([
            'name' => $request->name,
            'destination' => $request->destination,
            'description' => $request->description,
            'price' => $request->price,
            'departure_time' => $request->departure_time,
            'passenger_quota' => $request->passenger_quota,
            'image' => $request->image,
        ]);

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    // Menghapus jadwal dari database
    // public function destroy($id)
    // {
    //     // $schedule->delete();
    //     // Schedule::where('id', $id)->delete();
    //         $schedule = Schedule::findOrFail($id);
    //         $schedule->delete();
    //     return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus!');
    // }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
        //     return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus!');

    }
}
