<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnNameFromItemKindToItemCaptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_kinds', function (Blueprint $table) {
            $table->renameColumn('item_kind', 'item_caption');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_kinds', function (Blueprint $table) {
            $table->renameColumn('item_caption', 'item_kind');
        });
    }
}
