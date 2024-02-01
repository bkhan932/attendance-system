<?php

namespace Database\Factories\AppHumanResources\Attendance\Domain;

use App\AppHumanResources\Attendance\Domain\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'date_of_birth' => $this->faker->dateTime
        ];
    }
}
