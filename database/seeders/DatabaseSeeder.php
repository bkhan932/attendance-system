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
    }
}
