<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assists', function (Blueprint $table) {
            $table->integer('assist_id')->autoIncrement()->comment('アシストID');
            $table->string('assist_name', 255)->comment('アシスト名称');
            $table->integer('assist_kind')->length(3)->comment('アシスト分類');
            $table->string('assist_discription', 255)->comment('アシスト説明');
            $table->integer('delete_flg')->length(1)->default(0)->comment('削除フラグ');
            $table->timestamp('create_date')->useCurrent()->comment('作成日');
            $table->timestamp('update_date')->useCurrent()->comment('更新日');

            $table->index('assist_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assists');
    }
}
