<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tags')->insert([
        'post_id'    => '1',
        'comment'    => 'タグ1',
        'created_at' => Carbon::now(),
      ]);
      DB::table('tags')->insert([
        'post_id'    => '2',
        'comment'    => 'タグ2',
        'created_at' => Carbon::now(),
      ]);
      DB::table('tags')->insert([
        'post_id'    => '3',
        'comment'    => 'タグ3',
        'created_at' => Carbon::now(),
      ]);
      DB::table('tags')->insert([
        'post_id'    => '4',
        'comment'    => 'タグ4',
        'created_at' => Carbon::now(),
      ]);

      DB::table('tags')->insert([
        'post_id'    => '1',
        'comment'    => 'タグ重複確認',
        'created_at' => Carbon::now(),
      ]);
      DB::table('tags')->insert([
        'post_id'    => '2',
        'comment'    => 'タグ重複確認',
        'created_at' => Carbon::now(),
      ]);


    }
}
