<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('Users')->delete();
        $users = array(
            array('name' => 'Sanjay', 'email' => 'hrsanjay@email.com','password' => hash::make('admin123'), 'role_id' => '1','phone' => '9899989988', 'hire_date' => '2021-01-11','hr_id' => '0','balance_leave' => '22'),
            array('name' => 'ajay', 'email' => 'hrajay@email.com','password' => hash::make('admin123'), 'role_id' => '1','phone' => '9899989988', 'hire_date' => '2021-01-11','hr_id' => '1','balance_leave' => '22'),
            array('name' => 'vijay', 'email' => 'hrvijay@email.com','password' => hash::make('admin123'), 'role_id' => '1','phone' => '9899989988', 'hire_date' => '2021-01-11','hr_id' => '1','balance_leave' => '22'),
            array('name' => 'amruta', 'email' => 'devamruta@email.com','password' => hash::make('admin123'), 'role_id' => '2','phone' => '9899989988', 'hire_date' => '2021-01-11','hr_id' => '1','balance_leave' => '22'),
            array('name' => 'pranav', 'email' => 'devpranav@email.com','password' => hash::make('admin123'), 'role_id' => '2','phone' => '9899989988', 'hire_date' => '2021-01-11','hr_id' => '2','balance_leave' => '22'),
            array('name' => 'sham', 'email' => 'devsham@email.com','password' => hash::make('admin123'), 'role_id' => '2','phone' => '9899989988', 'hire_date' => '2021-01-11','hr_id' => '2','balance_leave' => '22'),
        );
        \DB::table('Users')->insert($users);

    }
}
