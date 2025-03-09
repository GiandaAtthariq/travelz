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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama travel
            $table->string('destination'); // Lokasi destinasi
            $table->text('description')->nullable(); // Deskripsi destinasi
            $table->decimal('price', 10, 2); // Harga destinasi
            $table->datetime('departure_time'); // waktu keberangkatan
            $table->integer('passenger_quota'); // kuota maksimal penumpang
            $table->integer('passenger_count')->default(0); // kuota maksimal penumpang
            $table->string('image')->nullable(); // URL gambar destinasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
