<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->integer("state")->nullable();
            $table->integer("city")->nullable();
            $table->string("lat")->nullable();
            $table->string("long")->nullable();
            $table->string("cover")->nullable();
            $table->integer("total_price")->nullable();
            $table->integer("mortgage")->nullable();
            $table->integer("rent")->nullable();
            $table->integer("foundation")->nullable();
            $table->integer("border_width")->nullable();
            $table->text("description")->nullable();
            $table->json("possibilities")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->string("status")->default("not-completed");
            $table->unsignedBigInteger("document_type")->nullable();
            $table->text("address")->nullable();
            $table->integer("height")->nullable();
            $table->tinyInteger("level")->default(0);
            $table->string("ads_type")->nullable();
            
            $table->boolean("is_vip")->nullable();
            $table->boolean("agreed_price")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("document_type")->references("id")->on("document_types");
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
        Schema::dropIfExists('shops');
    }
}
