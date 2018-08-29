<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new Carbon('1995-11-28');
        $student = [
            ['id' => 1, 'fullname' => 'Hoc sinh 1','user_id' => 5, 'dateofbirth'=>$date],
            ['id' => 2, 'fullname' => 'Hoc sinh 2','user_id' => 6, 'dateofbirth'=>$date],
            ['id' => 3, 'fullname' => 'Hoc sinh 3','user_id' => 7, 'dateofbirth'=>$date],
        ];
        DB::table('students')->insert($student);
    }
}
