<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateHistorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_historys', function (Blueprint $table) {
            $table->integer('update_history_id')->autoIncrement()->comment('更新履歴ID');
            $table->string('update_history_details', 255)->comment('更新内容');
            $table->timestamp('update_history_date')->useCurrent()->comment('更新日');

            $table->index(['update_history_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_historys');
    }
}
