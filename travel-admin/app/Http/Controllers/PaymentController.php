<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Booking;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('booking')->get();
        return view('payment/data_payment', compact('payments'));
    }

    /**
     * Menampilkan form tambah pembayaran.
     */
    public function create()
    {
        $booking = Booking::select('id')->get();
        return view('payment/create_payment', compact('booking'));
    }

    /**
     * Menyimpan pembayaran baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,paid,failed',
            'payment_method' => 'required|in:bank_transfer,credit_card,e-wallet',
            'payment_date' => 'required|date',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pembayaran.
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Menampilkan form edit pembayaran.
     */
    public function edit(Payment $payment)
    {
        $booking = Booking::select('id')->get();
        return view('payment/edit_payment', compact('payment', 'booking'));
    }

    /**
     * Menyimpan perubahan data pembayaran.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,paid,failed',
            'payment_method' => 'required|in:bank_transfer,credit_card,e-wallet',
            'payment_date' => 'required|date',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Menghapus pembayaran dari database.
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);

    }
}
