<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class FolllowsTableSeeder extends Seeder
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
            'user_id' => User::where('name','管理者アカウント')->first()->id,
            'follow_user_id' => User::where('name','フォロー確認アカウント')->first()->id,
        ]);
        // フォロワー確認用
        DB::table('follows')->insert([
            'user_id' => User::where('name','フォロワー確認アカウント')->first()->id,
            'follow_user_id' => User::where('name','管理者アカウント')->first()->id,
        ]);
        // 相互フォロワー確認用
        DB::table('follows')->insert([
            'user_id' => User::where('name','管理者アカウント')->first()->id,
            'follow_user_id' => User::where('name','相互フォロー確認アカウント')->first()->id,
        ]);
        DB::table('follows')->insert([
            'user_id' => User::where('name','相互フォロー確認アカウント')->first()->id,
            'follow_user_id' => User::where('name','管理者アカウント')->first()->id,
        ]);
    }
}
