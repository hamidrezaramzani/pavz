<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullableFieldsInRentPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rent_prices', function (Blueprint $table) {
            $table->integer("middweek_discount")->nullable()->change();
            $table->integer("endweek_discount")->nullable()->change();
            $table->integer("peek_discount")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rent_prices', function (Blueprint $table) {
            $table->integer("middweek_discount")->nullable(false)->change();
            $table->integer("endweek_discount")->nullable(false)->change();
            $table->integer("peek_discount")->nullable(false)->change();
        });
    }
}
