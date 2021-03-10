<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSomeFieldsInVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('villas', function (Blueprint $table) {
            // max-capacity - more_pool_possibilities
            $table->renameColumn("`max-capacity`" , "max_capacity");
            $table->longText("more_pool_possibilities");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('villas', function (Blueprint $table) {
            $table->renameColumn("max_capacity" , "`max-capacity`");
            $table->dropColumn("more_pool_possibilities");
        });
    }
}
