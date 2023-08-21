<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'name',
        'type',
        'cost',
        'typeFrequency',
        'frequency',
        'monthsFrequency',
        'duration',
        'brand_id',
        'car_model_id',
        
    ];

  
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

}
