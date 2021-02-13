<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristics', function (Blueprint $table) {
            $table->integer('characteristic_id')->autoIncrement()->comment('特性ID');
            $table->integer('characteristic_kind')->length(3)->comment('特性分類');
            $table->integer('characteristic_efficacy')->length(1)->comment('特性効果量');
            $table->string('characteristic_name', 255)->comment('特性名称');
            $table->integer('delete_flg')->length(1)->default(0)->comment('削除フラグ');
            $table->timestamp('create_date')->useCurrent()->comment('作成日');
            $table->timestamp('update_date')->useCurrent()->comment('更新日');

            $table->index('characteristic_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characteristics');
    }
}
