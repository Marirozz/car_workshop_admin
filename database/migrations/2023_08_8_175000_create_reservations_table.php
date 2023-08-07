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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->string("date");
            $table->string("location");
            $table->string("details")->nullable();
            $table->foreignId('maintenance_id')->nullable()->references('id')->on('maintenances');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('employee_id')->constrained();
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
        Schema::dropIfExists('services');
    }
};
