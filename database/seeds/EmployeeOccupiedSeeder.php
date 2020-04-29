<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeOccupiedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_occupied')->insert([
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'day' => '1',
            'employee_id' => '1'
        ]);
        DB::table('employee_occupied')->insert([
            'start_time' => '14:00:00',
            'end_time' => '16:00:00',
            'day' => '1',
            'employee_id' => '1'
        ]);
        DB::table('employee_occupied')->insert([
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'day' => '1',
            'employee_id' => '2'
        ]);
    }
}
