<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habits', function (Blueprint $table) {
            //$table->increments('habit_id'); // id -> habit_idへ変更
            $table->increments('id'); 
            $table->string('habit_name'); // string へ変更しよう

            $table->timestamps();
        });   
            
        DB::table('habits')->insert([
                ['habit_name' => '一般化のし過ぎ'],
                ['habit_name' => '自分への関連付け'],
                ['habit_name' => '根拠のない推論ぎ'],
                ['habit_name' => '白か黒か思考'],
                ['habit_name' => 'すべき思考 '],
                ['habit_name' => '過大評価と過少評価'],
                ['habit_name' => '感情による決めつけ'],
            ]);

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habits');
    }
}
