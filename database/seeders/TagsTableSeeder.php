<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TagsTableSeeder extends Seeder
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
        'tag'    => 'タグ1',
        'created_at' => Carbon::now(),
      ]);
      DB::table('tags')->insert([
        'post_id'    => '2',
        'tag'    => 'タグ2',
        'created_at' => Carbon::now(),
      ]);
      DB::table('tags')->insert([
        'post_id'    => '3',
        'tag'    => 'タグ3',
        'created_at' => Carbon::now(),
      ]);
      DB::table('tags')->insert([
        'post_id'    => '4',
        'tag'    => 'タグ4',
        'created_at' => Carbon::now(),
      ]);

      DB::table('tags')->insert([
        'post_id'    => '1',
        'tag'    => 'タグ重複確認',
        'created_at' => Carbon::now(),
      ]);
      DB::table('tags')->insert([
        'post_id'    => '2',
        'tag'    => 'タグ重複確認',
        'created_at' => Carbon::now(),
      ]);


    }
}
