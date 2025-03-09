<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;
use App\Models\Payment;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Payment::class;
    public function definition(): array
    {
        return [
            'booking_id' => Booking::factory(), // Generate booking dummy
            'amount' => $this->faker->randomFloat(2, 100, 10000), // Nilai pembayaran antara 100 - 10.000
            'payment_date' => now(), // Tanggal saat ini
            'payment_status' => $this->faker->randomElement(['pending', 'paid', 'failed']), // Status acak
            'payment_method' => $this->faker->randomElement(['bank_transfer', 'credit_card', 'e-wallet']), // Metode acak
        ];
    }
}
