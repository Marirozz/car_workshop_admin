<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 
        'date', 
        'details', 
        'maintenance_id',
        'vehicle_id',
        'customer_id', 
        'employee_id',
        'status'
    ];

    protected $casts = ['date' => 'datetime'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
     public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}
