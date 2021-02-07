<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Model::unguard();
        $this->call(DepartmentSeeder::class);
        $this->call(EmployeeLeaveHistorySeeder::class);
        $this->call(LeaveTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        Model::reguard();
    }
}
