<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ←これを追加

class ColumnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('columns')->insert([
                'title' => 'test title ' . $i,
                'content' => 'test content ' . $i,
                'emotion_name' => 'test' . $i,
                'emotion_strength' => '3',
                'thoughts' => 'test',
                'user_id' => 1
            ]);
        }
    }
}
