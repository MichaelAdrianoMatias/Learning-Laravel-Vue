<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',30);
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->references('id')->on('room_types');
            $table->string('category');
            $table->float('rate',8,2);
            $table->float('rateperhour',8,2);
            $table->integer('hours');
            $table->boolean('active')->default(1);
            $table->integer('created_by')->default(1);
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
        Schema::dropIfExists('room_rate');
    }
}
