<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowSeatPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_seat_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('show_id')->unsigned()->nullable();
            $table->foreign('show_id')->references('id')->on('shows');
            
            $table->integer('showroom_id')->unsigned()->nullable();
            $table->foreign('showroom_id')->references('id')->on('showrooms');

            $table->integer('seat_id')->unsigned()->nullable();
            $table->foreign('seat_id')->references('id')->on('seats');

            $table->decimal('price',5,2);
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
        Schema::dropIfExists('show_seat_prices');
    }
}
