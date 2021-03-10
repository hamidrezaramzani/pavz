<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullableFieldsInPoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pools', function (Blueprint $table) {
            $table->text("heating_systems")->nullable()->change();
            $table->text("cooling_systems")->nullable()->change();
            $table->smallInteger("width")->nullable()->change();
            $table->smallInteger("length")->nullable()->change();
            $table->smallInteger("min_depth")->nullable()->change();
            $table->smallInteger("max_depth")->nullable()->change();
            $table->json("possibilities")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pools', function (Blueprint $table) {
            $table->json("heating_systems")->nullable(false)->change();
            $table->json("cooling_systems")->nullable(false)->change();
            $table->tinyInteger("width")->nullable(false)->change();
            $table->tinyInteger("length")->nullable(false)->change();
            $table->tinyInteger("min_depth")->nullable(false)->change();
            $table->tinyInteger("max_depth")->nullable(false)->change();
            $table->json("possibilities")->nullable(false)->change();
        });
    }
}
