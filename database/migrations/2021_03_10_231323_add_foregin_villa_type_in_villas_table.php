<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeginVillaTypeInVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('villas', function (Blueprint $table) {
            $table->foreign("villa_type")->references("id")->on("villa_types");
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
            $table->dropForeign(["villa_types"]);
        });
    }
}
