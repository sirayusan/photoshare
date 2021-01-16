<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // デバッグアカウント作成
        DB::table('users')->insert([
            'name' => '管理者アカウント',
            'email' => 'abcde@gmail.com',
            'comment' => '確認',
            'password' => Hash::make('00000000'),
        ]);
        DB::table('users')->insert([
            'name' => 'フォロー確認アカウント',
            'email' => 'follow@gmail.com',
            'comment' => '確認',
            'password' => Hash::make('00000000'),
        ]);
        DB::table('users')->insert([
            'name' => 'フォロワー確認アカウント',
            'email' => 'follower@gmail.com',
            'comment' => '確認',
            'password' => Hash::make('00000000'),
        ]);
        DB::table('users')->insert([
            'name' => '相互フォロー確認アカウント',
            'email' => 'followexchange@gmail.com',
            'comment' => '確認',
            'password' => Hash::make('00000000'),
        ]);
    }
}
