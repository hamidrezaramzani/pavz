<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string("delivery_time")->nullable();
            $table->string("discharge_time")->nullable();
            $table->tinyInteger("min_stay")->nullable();
            $table->text("more_time_rules_description")->nullable();
            $table->text("more_rules_description")->nullable();
            $table->tinyInteger("animal")->nullable();
            $table->tinyInteger("smoke")->nullable();
            $table->tinyInteger("party")->nullable();
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
        Schema::dropIfExists('rules');
    }
}
