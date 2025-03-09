<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade'); // Relasi ke bookings
            $table->decimal('amount', 10, 2); // Jumlah pembayaran
            $table->timestamp('payment_date')->useCurrent(); // Tanggal pembayaran
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending'); // Status pembayaran
            $table->enum('payment_method', ['bank_transfer', 'credit_card', 'e-wallet']); // Metode pembayaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
