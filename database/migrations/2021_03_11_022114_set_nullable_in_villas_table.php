<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullableInVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('villas', function (Blueprint $table) {
            $table->json("more_pool_possibilities")->nullable()->change();
            $table->json("views")->nullable()->change();
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
            $table->json("more_pool_possibilities")->nullable(false)->change();
            $table->json("views")->nullable(false)->change();
        });
    }
}
