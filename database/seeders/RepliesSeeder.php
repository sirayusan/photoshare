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
      DB::table('Replies')->insert([
        'user_id'    => '1',
        'post_id'    => '1',
        'comment'    => Str::random(10),
        'created_at' => Carbon::now(),
      ]);
    }
}
