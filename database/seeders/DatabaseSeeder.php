<?php

namespace Database\Seeders;

use App\Models\Employee;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // SEEDERS OFFICE TABLE
        $this->call(OfficeTableSeeder::class);
        // SEEDERS DETAILED OFFICE TABLE
        $this->call(DetailedOfficeTableSeeder::class);
        // SEEDERS ADMIN TABLE
        $this->call(AdminSeeder::class);
        // SEEDERS SUPERADMIN TABLE
        $this->call(SuperAdminSeeder::class);

        // FACTORY
        // MAKE EMPLOYEE FAKER(100)
        Employee::factory(100)->create();
    }
}
