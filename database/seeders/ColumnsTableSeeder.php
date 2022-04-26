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
        for ($i = 1; $i <= 100; $i++) {
            for ($j = 1; $j <= 100; $j++) {
                DB::table('events')->insert([
                    'user_id' => $i,
                    'title' => 'userid' . ' = ' . $i . ' test title ' . $j,
                    'content' => 'userid' . ' = ' . $i . ' test content ' . $j,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);

                
            }
        }
    }
}
