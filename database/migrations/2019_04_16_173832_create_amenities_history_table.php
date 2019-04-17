<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmenitiesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities_history', function (Blueprint $table) {
            $table->integer('id');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('totalquantity')->nullable();
            $table->float('barrowedcost',8,2)->nullable();
            $table->float('damagedcost',8,2)->nullable();
            $table->integer('created_by')->default(1);
            $table->datetime('created_at')->nullable();
            $table->integer('modified_by')->nullable();
            $table->datetime('modified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenities_history');
    }
}
