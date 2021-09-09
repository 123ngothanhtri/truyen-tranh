<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111'),
        ]);

        DB::table('theloai')->insert([
            'ten_theloai' => 'Truyện cổ tích',
        ]);
        DB::table('theloai')->insert([
            'ten_theloai' => 'Truyện ma',
        ]);
        DB::table('theloai')->insert([
            'ten_theloai' => 'Truyện cười',
        ]);
        DB::table('theloai')->insert([
            'ten_theloai' => 'Truyện trữ tình',
        ]);
        DB::table('theloai')->insert([
            'ten_theloai' => 'Truyện Manga',
        ]);

    }
}
        