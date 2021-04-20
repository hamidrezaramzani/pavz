<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetCascadeVillaIdFieldInVillaScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('villa_scores', function (Blueprint $table) {
            $table->dropForeign(["villa_id"]);
            $table->foreign("villa_id")->references("id")->on("villas")->onDelete("cascade")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('villa_scores', function (Blueprint $table) {
            $table->foreign("villa_id")->references("id")->on("villas")->change();
        });
    }
}
