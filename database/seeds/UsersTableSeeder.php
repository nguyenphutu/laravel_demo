<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            ['id' => 1, 'name' => 'admin','email' => 'admin@gmail.com', 'password' => bcrypt('123456')],
            ['id' => 2, 'name' => 'teacher1','email' => 'teacher1@gmail.com', 'password' => bcrypt('123456')],
            ['id' => 3, 'name' => 'teacher2','email' => 'teacher2@gmail.com', 'password' => bcrypt('123456')],
            ['id' => 4, 'name' => 'teacher3','email' => 'teacher3@gmail.com', 'password' => bcrypt('123456')],
            ['id' => 5, 'name' => 'student1','email' => 'student1@gmail.com', 'password' => bcrypt('123456')],
            ['id' => 6, 'name' => 'student2','email' => 'student2@gmail.com', 'password' => bcrypt('123456')],
            ['id' => 7, 'name' => 'student3','email' => 'student3@gmail.com', 'password' => bcrypt('123456')],
        ];

        DB::table('users')->insert($users);
    }
}
