<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_kinds', function (Blueprint $table) {
            $table->integer('item_id')->length(2)->comment('アイテムID');
            $table->integer('item_kind')->length(3)->comment('アイテム種別');
            $table->timestamp('create_date')->useCurrent()->comment('作成日');
            $table->timestamp('update_date')->useCurrent()->comment('更新日');

            $table->primary(['item_id', 'item_kind']);
            $table->index(['item_id', 'item_kind']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_kinds');
    }
}
