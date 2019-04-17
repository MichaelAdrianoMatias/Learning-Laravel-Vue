<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomamenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_amenities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id')->default(1)->nullable();
            $table->unsignedInteger('amenity_id')->default(1)->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            //$table->foreign('amenity_id')->references('id')->on('amenities');
            $table->integer('quantity');
            $table->string('additional');
            $table->double('cost')->nullable();
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
        Schema::dropIfExists('roomamenities');
    }
}
