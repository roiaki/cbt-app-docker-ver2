<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();        
            $table->string('title');
            $table->string('content');
            $table->string('emotion_name');
            $table->integer('emotion_strength');
            $table->string('thinking')->nullable();
            $table->string('basis_thinking')->nullable();
            $table->string('opposite_fact')->nullable();
            $table->string('new_thinking')->nullable();
            $table->string('new_emotion')->nullable();
            $table->timestamps();
            

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columns');
    }
}
