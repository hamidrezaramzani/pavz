<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsInAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->unsignedBigInteger("area_type")->nullable();
            $table->integer("count_of_border")->nullable();
            $table->integer("main_border_width")->nullable();
            $table->foreign("area_type")->references("id")->on("area_types");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->dropForeign(["area_type"]);
            $table->dropColumn(["area_type" , "foundation" , "count_of_border" , "main_border_width"]);
        });
    }
}
