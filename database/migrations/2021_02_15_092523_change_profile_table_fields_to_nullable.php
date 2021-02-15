<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProfileTableFieldsToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string("fullname", 150)->nullable()->change();
            $table->string("email")->unique()->nullable()->change();
            $table->text("address")->nullable()->change();
            $table->string("telegram_id")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string("fullname", 150)->change();
            $table->string("email")->unique()->change();
            $table->text("address")->change();
            $table->string("telegram_id")->change();
        });
    }
}
