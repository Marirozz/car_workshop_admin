<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'name',
        'type',
        'cost',
        'frequency',
        'duration',
        'brand_id',
        'car_model_id',
        
    ];

    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

}
