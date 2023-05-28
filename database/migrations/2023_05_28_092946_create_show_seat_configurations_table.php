<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowSeatConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_seat_configurations', function (Blueprint $table) {
            $table->id();
            $table->integer('vip_seats');
            $table->decimal('vip_seat_price');
            
            $table->integer('couple_seats');
            $table->decimal('couple_seat_price');
            
            $table->integer('super_seats');
            $table->decimal('super_seat_price');

            $table->integer('vipwhatever_seats');
            $table->decimal('vipwhatever_seat_price');
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
        Schema::dropIfExists('show_seat_configurations');
    }
}
