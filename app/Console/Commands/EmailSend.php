<?php

namespace App\Console\Commands;

use App\Http\Controllers\CalculationEmailController;
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

class EmailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia un correo a los clientes que les toque mantenimiento';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {  
        
        CalculationEmailController::CalculationEmail();
        // $latestEntriesSubquery = VehicleEntry::select('vehicle_id', DB::raw('MAX(entry_date) as latest_entry_date'))
        //     ->groupBy('vehicle_id');

        // DB::table('vehicle_entries')
        //     ->joinSub($latestEntriesSubquery, 'latest_entries', function ($join) {
        //         $join->on('vehicle_entries.vehicle_id', '=', 'latest_entries.vehicle_id')
        //             ->on('vehicle_entries.entry_date', '=', 'latest_entries.latest_entry_date');
        //     })
        //     ->get()
        //     ->each(function ($vehicleEntry) {
        //         $maintenance = Maintenance::find($vehicleEntry->maintenance_id);
        //         if(Carbon::now()->diffInMonths($vehicleEntry->entry_date) >= $maintenance->monthsFrequency) {
        //             $email = Customer::find($vehicleEntry->customer_id)->email;
        //             Mail::to($email)->send(new MaintenanceMailable);
        //         }
        //         return view('emails.maintenance')->with('maintenance', $maintenance)->with('email',$email);

        //     });
    }
}
