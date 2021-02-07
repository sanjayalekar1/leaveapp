<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leave_type')->insert([
        
            [
            'leave_type' => 'Paid',
            ],
            [
            'leave_type' => 'Seak',
            ]
          
        ]);
    }
}
