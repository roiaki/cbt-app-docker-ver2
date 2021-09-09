<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSevenColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seven_columns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('three_col_id')->unsigned();
            $table->string('title');
            $table->string('content');
            $table->string('emotion_name');
            $table->integer('emotion_strength');
            $table->string('thinking');
            $table->string('basis_thinking');
            $table->string('oppsite_fact');
            $table->string('new_thinking');
            $table->string('new_emotion');
            
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('three_col_id')->references('id')->on('columns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seven_columns');
    }
}
