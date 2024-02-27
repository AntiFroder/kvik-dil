<?php

namespace Database\Factories;

use App\Enums\TaskStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'status' => $this->faker->randomElement(TaskStatusEnum::getValues()),
            'created_date' => $this->faker->randomElement(
                [
                        now()->format('Y-m-d'),
                        Carbon::yesterday()->format('Y-m-d'),
                        Carbon::tomorrow()->format('Y-m-d')
                ]
            )
        ];
    }
}
