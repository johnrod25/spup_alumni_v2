<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'user_id' => '0',
            'name' => 'Administrator',
            'username' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'usertype' => '1',
            'is_deleted' => 0,
        ]);
    }
}
