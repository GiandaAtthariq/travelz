<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Schedule;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition(): array
    {
        return [
            
            'name' => $this->faker->company(),
            'destination' => $this->faker->city(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 100, 500),
            'departure_time' => $this->faker->dateTimeThisYear(),
            'passenger_quota' => $this->faker->numberBetween(5, 50),
            'image' => $this->faker->imageUrl(640, 480, 'travel'),
        ];
    }
}
