<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('posts')->insert([
        'user_id' => '1',
        'title'   => '管理者投稿確認',
        'comment' => '確認用',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
      DB::table('posts')->insert([
        'user_id' => '2',
        'title'   => 'フォローアカウント投稿確認',
        'comment' => '確認用',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
      DB::table('posts')->insert([
        'user_id' => '3',
        'title'   => 'フォロワーアカウント投稿確認',
        'comment' => '確認用',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
      DB::table('posts')->insert([
        'user_id' => '4',
        'title'   => '相互フォローアカウント投稿確認',
        'comment' => '確認用',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
