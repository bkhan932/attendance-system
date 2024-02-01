<?php
namespace Database\Factories\AppHumanResources\Attendance\Domain;

use App\AppHumanResources\Attendance\Domain\Attendance;
use App\AppHumanResources\Attendance\Domain\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'checkin' => $this->faker->dateTimeBetween('-10 hours', 'now'),
            'checkout' => $this->faker->dateTimeInInterval('now', '+10 hours', 'GMT'),
            'status' => $this->faker->sentence,
        ];
    }
}
