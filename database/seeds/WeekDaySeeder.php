<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weekdays')->insert([
            'day' => 'Monday'
        ]);
        DB::table('weekdays')->insert([
            'day' => 'Tuesday'
        ]);
        DB::table('weekdays')->insert([
            'day' => 'Wednesday'
        ]);
        DB::table('weekdays')->insert([
            'day' => 'Thursday'
        ]);
        DB::table('weekdays')->insert([
            'day' => 'Friday'
        ]);
        DB::table('weekdays')->insert([
            'day' => 'Saturday'
        ]);
    }
}
