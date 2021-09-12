<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thinks', function (Blueprint $table) {
            $table->increments('think_id'); // id -> think_idへ変更

            $table->integer('threecol_id')->unsigned()->index();
            $table->integer('habit_id')->unsigned()->index();

            $table->timestamps();

            // 外部キー設定
            $table->foreign('threecol_id')
                ->references('threecol_id')
                ->on('three_columns')
                ->onDelete('cascade');

            $table->foreign('habit_id')
                ->references('habit_id')
                ->on('habits')
                ->onDelete('cascade');

            // user_idとmicropost_idの組み合わせの重複を許さない
            $table->unique(['threecol_id', 'habit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thinks');
    }
}
