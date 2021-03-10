<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_prices', function (Blueprint $table) {
            $table->id();
            $table->integer("middweek");
            $table->integer("endweek");
            $table->integer("peek");
            $table->integer("price_per_person");
            

            $table->integer("middweek_discount");
            $table->integer("endweek_discount");
            $table->integer("peek_discount");
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
        Schema::dropIfExists('rent_prices');
    }
}
