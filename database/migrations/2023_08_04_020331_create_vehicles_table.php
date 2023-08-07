<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->string('year');
            $table->string('token');
            $table->string('mileage');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('car_model_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
