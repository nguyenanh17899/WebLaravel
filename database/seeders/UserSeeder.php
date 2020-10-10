<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            'username' => "mai",
            'fullname' => "Nguyễn Mai",
            'email' => Str::random(10).'@gmail.com',
            'phonenumber' => $faker -> phoneNumber,
            'password' => Hash::make("123456"),
            'role' => 1
        ]);
        // DB::table('users')->insert([
        //     'username' => "anh",
        //     'fullname' => "Nguyễn Anh",
        //     'email' => Str::random(10).'@gmail.com',
        //     'phonenumber' => $faker -> phoneNumber,
        //     'password' => Hash::make("123456"),
        //     'role' => 0
        // ]);
    }
}
