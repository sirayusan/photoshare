<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FolllowSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // フォロー確認用
        DB::table('follows')->insert([
            'user_id' => '1',
            'follow_user_id' => '2',
        ]);
        // フォロワー確認用
        DB::table('follows')->insert([
            'user_id' => '3',
            'follow_user_id' => '1',
        ]);
        // 相互フォロワー確認用
        DB::table('follows')->insert([
            'user_id' => '1',
            'follow_user_id' => '4',
        ]);
        DB::table('follows')->insert([
            'user_id' => '4',
            'follow_user_id' => '1',
        ]);
    }
}
