<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->unsignedBigInteger("apartment_type")->nullable();
            $table->integer("foundation")->nullable();
            $table->integer("total_price")->nullable();
            $table->integer("price_per_meter")->nullable();
            $table->json("possibilities")->nullable();
            $table->integer("state")->nullable();
            $table->integer("city")->nullable();
            $table->integer("year_of_construction")->nullable();
            $table->tinyInteger("ads_type");
            $table->string("atype")->nullable();
            $table->string("htype")->nullable();
            $table->string("lat")->nullable();
            $table->string("long")->nullable();
            $table->text("address")->nullable();
            $table->integer("floors")->nullable();
            $table->integer("unites")->nullable();
            $table->unsignedBigInteger("document_type")->nullable();
            $table->json("heaving_system")->nullable();
            $table->json("cooling_system")->nullable();
            $table->string("status")->nullable()->default("not-completed");
            $table->string("cover")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->boolean("is_vip")->nullable();
            $table->timestamps();




            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("document_type")->references("id")->on("document_types")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
