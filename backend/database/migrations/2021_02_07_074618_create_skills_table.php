<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->integer('skill_id')->autoIncrement()->comment('スキルID');
            $table->string('skill_name', 255)->comment('スキル名称');
            $table->integer('skill_kind')->length(3)->comment('スキル分類');
            $table->string('skill_discription', 255)->comment('スキル説明');
            $table->integer('delete_flg')->length(1)->default(0)->comment('削除フラグ');
            $table->timestamp('create_date')->useCurrent()->comment('作成日');
            $table->timestamp('update_date')->useCurrent()->comment('更新日');

            $table->index('skill_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
