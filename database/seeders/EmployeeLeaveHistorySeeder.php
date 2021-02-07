<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeeLeaveHistory;


class EmployeeLeaveHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeLeaveHistory::factory()->times(30)->create();
        
    }
}
