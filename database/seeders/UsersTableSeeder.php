<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ←これを追加

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
           'name' => ['user01', 'user02', 'user03'],
           'email' => ['user01@test.com', 'user02@test.com', 'user03@test.com'],
           //'password' => ["password_hash('testtest')", "password_hash('testtest')", "password_hash('testtest')"]
        ];
var_dump($users['name'][0]);
        
        for ($i = 0; $i < 3; $i++) {
            DB::table('users')->insert([
                'name' => $users['name'][$i],
                'email' => $users['email'][$i],
                'password' => password_hash('testtest', PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
