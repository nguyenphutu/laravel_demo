<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new Carbon('1995-11-28');
        $teacher = [
            ['id' => 1, 'fullname' => 'Giao vien 1','user_id' => 2, 'dateofbirth'=>$date, 'position'=>'teacher'],
            ['id' => 2, 'fullname' => 'Giao vien 2','user_id' => 3, 'dateofbirth'=>$date, 'position'=>'teacher'],
            ['id' => 3, 'fullname' => 'Giao vien 3','user_id' => 4, 'dateofbirth'=>$date, 'position'=>'teacher'],
        ];
        DB::table('teacher')->insert($teacher);
    }
}
