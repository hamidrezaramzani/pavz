<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();

            $table->string("title")->nullable();
            $table->integer("state")->nullable();
            $table->integer("city")->nullable();
            $table->unsignedBigInteger("document_type")->nullable();
            $table->integer("foundation")->nullable();
            $table->json("scores")->nullable();
            $table->integer("total_price")->nullable();
            $table->integer("price_per_meter")->nullable();
            $table->string("cover")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->text("address")->nullable();
            $table->string("lat")->nullable();
            $table->string("long")->nullable();

            $table->boolean("is_vip")->nullable();
            $table->string("status")->default("not-completed");
            $table->integer("level")->default(0);


            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("document_type")->references("id")->on("document_types")->onDelete("cascade");
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
        Schema::dropIfExists('areas');
    }
}
