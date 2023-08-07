<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaintenanceStoreRequest;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Maintenance;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaintenanceController extends Controller
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
                Maintenance::all()
            );
        }
        $maintenances = Maintenance::latest()->paginate(10);
        return view('maintenances.index')->with('maintenances', $maintenances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenances.create', [
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
    public function store(MaintenanceStoreRequest $request)
    {

        $maintenance = Maintenance::create([
            'name' => $request->name,
            'type' => $request->type,
            'cost' => $request->cost,
            'frecuency' => $request->frecuency,
            'duration,' => $request->duration,
            'brand_id' => $request->brand_id,
            'car_model_id' => $request->car_model_id,
            
        ]);

        if (!$maintenance) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while creating Maintenance.');
        }
        return redirect()->route('maintenances.index')->with('success', 'Success, your Maintenance have been created.');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(maintenance $maintenance)
    {  
        return view('maintenances.edit', [
            "brands" => Brand::all(),
            "car_models" => CarModel::all(),
            "maintenance"=>$maintenance
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $maintenance->name = $request->name;
        $maintenance->type = $request->type;
        $maintenance->cost = $request->cost;
        $maintenance->frecuency = $request->frecuency;
        $maintenance->duration = $request->duration;
        $maintenance->brand_id = $request->brand_id;
        $maintenance->car_model_id = $request->car_model_id;
        


        if (!$maintenance->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating maintenance.');
        }
        return redirect()->route('maintenances.index')->with('success', 'Success, your maintenance have been updated.');
    }

    public function destroy(Maintenance $maintenance)
    {
       
        $maintenance->delete();

        return redirect()->route('maintenances.index')->with('success', 'maintenance eliminado.');
    }
}
