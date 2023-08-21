<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleEntryStoreRequest;
use App\Http\Requests\VehicleStoreRequest;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\VehicleEntry;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Maintenance;
use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return response(
                VehicleEntry::all()
            );
        }
        //$vehicle_entries=VehicleEntry::select("*")->orderBy("entry_date","desc")->get();
       $vehicle_entries = VehicleEntry::latest()->paginate(10);
        return view('vehicle_entries.index')->with('vehicle_entries', $vehicle_entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle_entries.create', [

            "vehicles" => Vehicle::all(),
            "customers" => Customer::all(),
            "maintenances"=>Maintenance::all(),
            "employees"=>Employee::all(),
            "reservations"=>Reservation::all(),
            "brands" => Brand::all(),
            "car_models" => CarModel::all(),
            "employees"=>Employee::all(),

        ]);
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleEntryStoreRequest $request)
    {

        $vehicle_entry = VehicleEntry::create([
            'customer_id' => $request->customer_id,
            'details'=>$request->details,
            'traveled'=>$request->traveled,
            'type_traveled'=>$request->type_traveled,
            'entry_date'=>$request->entry_date,
            'departure_date'=>$request->departure_date,
            'vehicle_id' => $request->vehicle_id,
            'maintenance_id' => $request->maintenance_id,
            'employee_id' => $request->employee_id,
            'reservation_id' => $request->reservation_id,
          
        ]);

        if (!$vehicle_entry) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while creating Vehicle.');
        }
        return redirect()->route('vehicle_entries.index')->with('success', 'Success, your vehicle have been created.');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleEntry $vehicle_entry)
    {  
        return view('vehicle_entries.edit', [
            "vehicles" => Vehicle::all(),
            "customers" => Customer::all(),
            "brands" => Brand::all(),
            "car_models" => CarModel::all(),
            "maintenances" => Maintenance::all(),
            "employees"=>Employee::all(),
            "reservations"=>Reservation::all(),
            "vehicle_entry"=>$vehicle_entry,
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleEntry $vehicle_entry)
    {
        // $vehicle_entry->customer_id = $request->customer_id;
        $vehicle_entry->details = $request->details;
        $vehicle_entry->traveled = $request->traveled;
        $vehicle_entry->type_traveled = $request->type_traveled;
        $vehicle_entry->entry_date = $request->entry_date;
        $vehicle_entry->departure_date = $request->departure_date;
        // $vehicle_entry->vehicle_id=$request->vehicle_id;
        $vehicle_entry->maintenance_id = $request->maintenance_id;
        $vehicle_entry->employee_id = $request->employee_id;
        $vehicle_entry->reservation_id = $request->reservation_id;
     


        if (!$vehicle_entry->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating vehicle.');
        }
        return redirect()->route('vehicle_entries.index')->with('success', 'Success, your vehicle have been updated.');
    }

    public function destroy(VehicleEntry $vehicle_entry)
    {
       
        $vehicle_entry->delete();

        return redirect()->route('vehicle_entries.index')->with('success', 'Vehiculo eliminado.');
    }
    
}
