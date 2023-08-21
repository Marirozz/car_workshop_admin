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
        Schema::create('vehicle_entries', function (Blueprint $table) {
            $table->id();
            $table->text('details');
            $table->numeric('traveled');
            $table->string('typeTraveled');
            $table->date('entry_date');
            $table->date('departure_date');
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->foreignId('maintenance_id')->constrained();
            $table->foreignId('employee_id')->constrained();
            $table->foreignId('reservation_id')->constrained();
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
        Schema::dropIfExists('vehicle_entries');
    }
};
