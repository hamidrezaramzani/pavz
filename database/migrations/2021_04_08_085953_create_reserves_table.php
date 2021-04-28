<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->integer("guests");
            $table->text("fullname");
            $table->text("phonenumber");
            $table->text("start");
            $table->string("status")->default("new");
            $table->text("end");    
            $table->unsignedBigInteger("villa_id");
            
            $table->foreign("villa_id")->references("id")->on("villas")->onDelete("cascade");
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
        Schema::dropIfExists('reserves');
    }
}
