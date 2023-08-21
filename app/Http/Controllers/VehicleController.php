<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
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
                Vehicle::all()
            );
        }
        $vehicles = Vehicle::latest()->paginate(10);
        return view('vehicles.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create', [
            "customers" => Customer::all(),
            "brands" => Brand::all(),
            "car_models" => CarModel::all(),
        ]);
      
        
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleStoreRequest $request)
    {

        $validator=Validator::make($request->all(),[
            'license_plate'=>'required|unique:vehicles,license_plate',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $vehicle = Vehicle::create([
            'customer_id' => $request->customer_id,
            'type'=>$request->type,
            'brand_id' => $request->brand_id,
            'car_model_id' => $request->car_model_id,
            'year' => $request->year,
            'license_plate' => $request->license_plate,
            'token' => $request->token,
            'mileage' => $request->mileage,
        ]);

        
        if (!$vehicle) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while creating Vehicle.');
        }
        return redirect()->route('vehicles.index')->with('success', 'Success, your vehicle have been created.');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {  
        return view('vehicles.edit', [
            "customers" => Customer::all(),
            "brands" => Brand::all(),
            "car_models" => CarModel::all(),
            "vehicle"=>$vehicle,
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->customer_id = $request->customer_id;
        $vehicle->type = $request->type;
        $vehicle->brand_id = $request->brand_id;
        $vehicle->car_model_id = $request->car_model_id;
        $vehicle->year = $request->year;
        $vehicle->license_plate = $request->license_plate;
        $vehicle->token = $request->token;
        $vehicle->mileage = $request->mileage;


        if (!$vehicle->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating vehicle.');
        }
        return redirect()->route('vehicles.index')->with('success', 'Success, your vehicle have been updated.');
    }

    public function destroy(Vehicle $vehicle)
    {
       
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehiculo eliminado.');
    }
}
