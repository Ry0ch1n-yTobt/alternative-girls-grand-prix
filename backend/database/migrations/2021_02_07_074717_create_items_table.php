<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->integer('item_id')->length(2)->comment('アイテムID');
            $table->integer('item_number')->length(3)->comment('アイテム番号');
            $table->string('item_name', 255)->comment('アイテム名');
            $table->integer('delete_flg')->length(1)->default(0)->comment('削除フラグ');
            $table->timestamp('create_date')->useCurrent()->comment('作成日');
            $table->timestamp('update_date')->useCurrent()->comment('更新日');

            $table->primary(['item_id', 'item_number']);
            $table->index(['item_id', 'item_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
