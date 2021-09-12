<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('includes', function (Blueprint $table) {
            $table->increments('include_id'); // id -> include_idへ変更

            $table->integer('threecol_id')->unsigned()->index();
            $table->integer('emotion_id')->unsigned()->index();

            $table->timestamps();

            // 外部キー設定
            $table->foreign('threecol_id')
                ->references('threecol_id')
                ->on('three_columns')
                ->onDelete('cascade');

            $table->foreign('emotion_id')
                ->references('emotion_id')
                ->on('emotions')
                ->onDelete('cascade');

            // user_idとmicropost_idの組み合わせの重複を許さない
            $table->unique(['threecol_id', 'emotion_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('includes');
    }
}
