<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMainFieldsInDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->tinyInteger("type");
            $table->json("scores");
            $table->unsignedBigInteger("villa_id");
            $table->foreign("villa_id")->references("id")->on("villas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn("type");
            $table->dropColumn("scores");
            $table->dropForeign(["villa_id"]);
            $table->dropColumn("villa_id");
        });
    }
}
