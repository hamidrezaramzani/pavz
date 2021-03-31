<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgreedPriceInSoldVillaPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sold_villa_prices', function (Blueprint $table) {
            $table->boolean("agreed_price")->nullable()->default(false);
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
            $table->dropColumn("agreed_price");
        });
    }
}
