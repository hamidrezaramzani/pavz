<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("pool_type");
            $table->string("pool_location");
            $table->json("heating_systems");
            $table->json("cooling_systems");
            $table->tinyInteger("width");
            $table->tinyInteger("length");
            $table->tinyInteger("min_depth");
            $table->tinyInteger("max_depth");
            $table->tinyInteger("has_fun_possibilities");
            $table->tinyInteger("has_bathroom");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pools');
    }
}
