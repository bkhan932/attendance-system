<?php

namespace Database\Seeders;

use App\AppHumanResources\Attendance\Domain\Attendance;
use App\AppHumanResources\Attendance\Domain\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Attendance::factory()->count(50)->create();
        Employee::factory()->count(10)->create();
	Employee::create([
	    'first_name' => "Bilal",
            'last_name' => "Khan",
            'email' => "bilal@gmail.com",
            'date_of_birth' => strtotime("2000-2-2");
	]);
    }
}
