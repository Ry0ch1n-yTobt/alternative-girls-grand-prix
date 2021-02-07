<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->integer('album_no')->length(5)->comment('アルバムNo.');
            $table->string('album_name', 255)->comment('アルバム名');
            $table->integer('char')->length(2)->comment('キャラ');
            $table->integer('attribute')->length(1)->comment('属性');
            $table->integer('type')->length(1)->comment('タイプ');
            $table->integer('rarity')->length(1)->comment('レアリティ');
            $table->integer('weapon')->length(1)->comment('武器種');
            $table->integer('gp')->length(1)->comment('衣装解放');
            $table->integer('physical_zero')->length(3)->nullable()->comment('衣装版0体力');
            $table->integer('atack_zero')->length(3)->nullable()->comment('衣装版0攻撃力');
            $table->integer('defence_zero')->length(3)->nullable()->comment('衣装版0防御力');
            $table->integer('physical_max')->length(3)->nullable()->comment('衣装版MAX体力');
            $table->integer('atack_max')->length(3)->nullable()->comment('衣装版MAX攻撃力');
            $table->integer('defence_max')->length(3)->nullable()->comment('衣装版MAX防御力');
            $table->integer('speed')->length(3)->nullable()->comment('素早さ');
            $table->integer('accuracy')->length(3)->nullable()->comment('命中');
            $table->integer('avoidance')->length(3)->nullable()->comment('回避');
            $table->decimal('critical', 3, 1)->nullable()->comment('クリティカル');
            $table->integer('skill1_zero')->length(3)->nullable()->comment('衣装版0スキル1');
            $table->integer('skill2_zero')->length(3)->nullable()->comment('衣装版0スキル2');
            $table->integer('skill1_max')->length(3)->nullable()->comment('衣装版MAXスキル1');
            $table->integer('skill2_max')->length(3)->nullable()->comment('衣装版MAXスキル2');
            $table->integer('characteristic1')->length(3)->nullable()->comment('特性1');
            $table->integer('characteristic2')->length(3)->nullable()->comment('特性2');
            $table->integer('resistance1')->length(3)->nullable()->comment('耐性1');
            $table->integer('resistance2')->length(3)->nullable()->comment('耐性2');
            $table->integer('delete_flg')->length(1)->default(0)->comment('削除フラグ');
            $table->timestamp('create_date')->useCurrent()->comment('作成日');
            $table->timestamp('update_date')->useCurrent()->comment('更新日');

            $table->primary('album_no');
            $table->index('album_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
