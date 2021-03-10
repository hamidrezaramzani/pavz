<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villas', function (Blueprint $table) {
            $table->id();

            // rent - sold
            $table->tinyInteger("ads_type")->default(1);


            $table->string("title")->nullable();
            $table->unsignedBigInteger("state")->nullable();
            $table->unsignedBigInteger("city")->nullable();
            $table->unsignedBigInteger("villatype")->nullable();
            $table->unsignedBigInteger("estatetype")->nullable();
            $table->tinyInteger("floors")->nullable();
            $table->tinyInteger("unites")->nullable();
            $table->smallInteger("foundation_area")->nullable();
            $table->smallInteger("foundation_home")->nullable();
            $table->smallInteger("year_of_counstraction")->nullable();
            $table->tinyInteger("ownership")->nullable();
            $table->tinyInteger("structure_type")->nullable();
            $table->tinyInteger("way_type")->nullable();
            $table->tinyInteger("neighbor")->nullable();
            $table->tinyInteger("road_tyoe")->nullable();
            $table->text("about_home")->nullable();
            $table->tinyInteger("standard_capacity")->nullable();
            $table->tinyInteger("max-capacity")->nullable();
            $table->json("heating_systems")->nullable();
            $table->json("cooling_systems")->nullable();
            $table->tinyInteger("number_of_wc")->nullable();
            $table->tinyInteger("number_of_bathroom")->nullable();
            $table->json("more_health_possibilities")->nullable();
            $table->json("courtyard")->nullable();
            $table->text("about_space_home")->nullable();
            $table->json("welfare_amenities")->nullable();
            $table->json("kitchen_facilities")->nullable();
            $table->text("more_info_space")->nullable();
            $table->text("address")->nullable();
            $table->string("lat")->nullable();
            $table->string("long")->nullable();
            $table->string("status")->default("not-completed");
            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
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
        Schema::dropIfExists('villas');
    }
}
