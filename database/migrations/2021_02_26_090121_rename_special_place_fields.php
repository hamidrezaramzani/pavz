<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSpecialPlaceFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("special_places", function (Blueprint $table) {
            $table->renameColumn("`distance-by-walking`", "distance_by_walking");
            $table->renameColumn("`distance-by-car`", "distance_by_car");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("special_places", function (Blueprint $table) {
            $table->renameColumn("distance_by_walking", "`distance-by-walking`");
            $table->renameColumn("distance_by_car", "`distance-by-car`");
        });
    }
}
