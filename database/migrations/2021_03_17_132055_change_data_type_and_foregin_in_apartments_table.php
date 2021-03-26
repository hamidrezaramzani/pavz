<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeAndForeginInApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->unsignedBigInteger("atype")->change();
            $table->unsignedBigInteger("htype")->change();

            $table->foreign("atype")->references("id")->on("apartment_account_types");
            $table->foreign("htype")->references("id")->on("apartment_types");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->integer("atype")->change();        
            $table->integer("htype")->change();
            
            $table->dropForeign(["atype"]);
            $table->dropForeign(["htype"]);
        });
    }
}
