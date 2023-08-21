<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleEntry extends Model
{
    protected $fillable = [
        'id',
        'customer_id',
        'details',
        'traveled',
        'type_traveled',
        'entry_date',
        'departure_date',
        'vehicle_id',
        'maintenance_id',
        'employee_id',
        'reservation_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
