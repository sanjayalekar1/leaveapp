<?php

namespace Database\Factories;

use App\Models\EmployeeLeaveHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeLeaveHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeLeaveHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'emp_id' => rand(4,6),
                'leave_start_date' => $this->faker->dateTimeBetween('now', '+05 days'),
                'leave_end_date' => $this->faker->dateTimeBetween('now', '+05 days'),
                'no_of_days' => rand(1,5),
                'leave_type' => rand(1,2),
                'reason' => $this->faker->sentence(5),
               
            ];

    }
}
