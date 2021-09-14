<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreeColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('three_columns', function (Blueprint $table) {
            $table->increments('threecol_id'); // id -> threecol_idへ変更
            $table->integer('user_id')->unsigned()->index();
            $table->integer('event_id')->unsigned()->index();
            
            $table->

            $table->timestamps();

            // 外部キー制約
            // $table->foreign(外部キーを設定するカラム名)->references(制約先のID名)->on(外部キー制約先のテーブル名);
            
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->foreign('event_id')
                ->references('event_id')
                ->on('events')
                ->onDelete('cascade');
               

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('three_columns');
    }
}
