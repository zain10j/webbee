<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_seats', function (Blueprint $table) {
            $table->id();
            $table->integer('show_id')->unsigned()->nullable();
            $table->foreign('show_id')->references('id')->on('shows');
            
            $table->integer('showseatprice_id')->unsigned()->nullable();
            $table->foreign('showseatprice_id')->references('id')->on('showseatprices');

            $table->integer('seat_id')->unsigned()->nullable();
            $table->foreign('seat_id')->references('id')->on('seats');

            $table->enum('status',['AVAILABLE','BOOKED']);
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
        Schema::dropIfExists('show_seats');
    }
}
