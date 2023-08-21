<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\VehicleEntry;
use Illuminate\Console\Command;
use App\Mail\MaintenanceMailable;
use App\Models\Maintenance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CalculationEmailController extends Controller
{

    
    public static function CalculationEmail(){
        $latestEntriesSubquery = VehicleEntry::select('vehicle_id', DB::raw('MAX(entry_date) as latest_entry_date'))
        ->groupBy('vehicle_id');
       
          DB::table('vehicle_entries')
        ->joinSub($latestEntriesSubquery, 'latest_entries', function ($join) {
            $join->on('vehicle_entries.vehicle_id', '=', 'latest_entries.vehicle_id')
                ->on('vehicle_entries.entry_date', '=', 'latest_entries.latest_entry_date');
        })
        ->get()
        ->each(function ($vehicleEntry) {
            $vehicle=Vehicle::find($vehicleEntry->vehicle_id);
            $maintenance = Maintenance::find($vehicleEntry->maintenance_id);
            if(Carbon::now()->diffInMonths($vehicleEntry->entry_date) >= $maintenance->monthsFrequency) {
                $customer = Customer::find($vehicleEntry->customer_id);
                Mail::to($customer->email)->send(new MaintenanceMailable($customer,$maintenance,$vehicle));
            }

        });

    }
   
}
