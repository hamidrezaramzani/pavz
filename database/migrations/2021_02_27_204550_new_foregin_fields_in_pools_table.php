<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewForeginFieldsInPoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pools', function (Blueprint $table) {
            $table->dropColumn("has_fun_possibilities");
            $table->dropColumn("has_bathroom");
            $table->json("possibilities");
            $table->unsignedBigInteger("villa_id");
            $table->foreign("villa_id")->references("id")->on("villas")->onDelete("cascade");
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
            $table->boolean("has_fun_possibilities");
            $table->boolean("has_bathroom");
            $table->dropColumn("possibilities");
            $table->dropForeign(["villa_id"]);
            $table->dropColumn(["villa_id"]);
        });
    }
}
