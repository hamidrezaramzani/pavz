<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("apartments", function (Blueprint $table) {
            $table->renameColumn("heaving_system", "heating_systems");
            $table->renameColumn("cooling_system", "cooling_systems");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table("apartments", function (Blueprint $table) {
            $table->renameColumn("heating_systems", "heaving_system");
            $table->renameColumn("cooling_system", "cooling_systems");
        });
    }
}
