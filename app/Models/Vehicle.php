<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'customer_id',
        'type',
        'brand_id',
        'car_model_id',
        'year',
        'license_plate',
        'mileage',
        
    ];
  

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
    public function vehicleEntries(){

        return $this->hasMany(VehicleEntry::class);
    }
}
