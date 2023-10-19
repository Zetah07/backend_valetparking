<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingSpacesTable extends Migration
{
    public function up()
    {
        Schema::create('parking_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_occupied')->default(false);
            $table->timestamp('entryTime')->useCurrent();
            $table->timestamp('exitTime')->nullable()->default(null);
            $table->decimal('price_per_hour', 5, 2);

            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parking_spaces');
    }
}