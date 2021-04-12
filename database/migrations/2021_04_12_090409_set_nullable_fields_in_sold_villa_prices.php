<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullableFieldsInSoldVillaPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sold_villa_prices', function (Blueprint $table) {
            $table->integer("total_price")->nullable()->change();
            $table->integer("price_per_meter")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sold_villa_prices', function (Blueprint $table) {
            $table->integer("total_price")->nullable(false)->change();
            $table->integer("price_per_meter")->nullable(false)->change();
        });
    }
}
