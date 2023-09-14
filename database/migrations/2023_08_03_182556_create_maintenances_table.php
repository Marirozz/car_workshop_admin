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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->float('cost');
            $table->string('type_frequency');
            $table->string('frequency');
            $table->numeric('monthsFrequency');
            $table->numeric('duration');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('car_model_id')->constrained();
            $table->timestamps();
        });
    }return $query->whereHas('factura.vendedor', function ($query) use($term){
        $query->where('id', $term);

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances ');
    }
};
