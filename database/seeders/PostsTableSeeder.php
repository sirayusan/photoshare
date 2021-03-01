<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;
use Carbon\Carbon;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->insert([
        'user_id' => User::where('name','管理者アカウント')->first()->id,
        'title'   => '管理者投稿確認',
        'comment' => '確認用',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
      DB::table('posts')->insert([
        'user_id' => User::where('name','フォロー確認アカウント')->first()->id,
        'title'   => 'フォローアカウント投稿確認',
        'comment' => '確認用',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
      DB::table('posts')->insert([
        'user_id' => User::where('name','フォロワー確認アカウント')->first()->id,
        'title'   => 'フォロワーアカウント投稿確認',
        'comment' => '確認用',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
      DB::table('posts')->insert([
        'user_id' => User::where('name','相互フォロー確認アカウント')->first()->id,
        'title'   => '相互フォローアカウント投稿確認',
        'comment' => '確認用',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
