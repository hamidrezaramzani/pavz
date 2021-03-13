<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldVillaPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_villa_prices', function (Blueprint $table) {
            $table->id();
            $table->integer("total_price");
            $table->integer("price_per_meter");
            $table->unsignedBigInteger("villa_id");
            $table->foreign("villa_id")->references("id")->on("villas");
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
        Schema::dropIfExists('sold_villa_prices');
    }
}
