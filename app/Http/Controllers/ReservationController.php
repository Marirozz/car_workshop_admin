<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Maintenance;
use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with(['customer', 'employee'])->orderByDesc('created_at')->get();
        return view('reservations.index')->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $employees = Employee::all();
        $maintenances=Maintenance::all();
        $vehicles = Vehicle::all();
        
        return view('reservations.create')->with([
            'customers' => $customers, 
            'employees' => $employees, 
            'vehicles' => $vehicles,
            'maintenances' => $maintenances]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data["type"] = $request->input('type') ? $request->input('type') : null;
        $data["date"] = $request->input('date') ? $request->input('date') : null;
        $data["details"] = $request->input('details') ? $request->input('details') : null;
        $data["maintenance_id"] = $request->input('maintenance_id') ? $request->input('maintenance_id') : null;
        $data["vehicle_id"]=$request->input('vehicle_id')?$request->input('vehicle_id'):null;
        $data["customer_id"] = $request->input('customer_id') ? $request->input('customer_id') : null;
        $data["employee_id"] = $request->input('employee_id') ? $request->input('employee_id') : null;
        $data["statu"] = $request->input('statu') ? $request->input('statu') : null;

        

        $reservation = Reservation::create($data);

        if (!$reservation) {
            return redirect()->back()->with('error', 'Perdón, Error creando la reservación.');
        }

        return redirect()->route('reservations.index')->with('success', 'Excelente, Tu Reservación se ha creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $customers = Customer::all();
        $employees = Employee::all(); 
        $maintenances = Maintenance::all();
        $vehicles = Vehicle::all();

        return view('reservations.edit')->with([
            'reservation' => $reservation, 
            'customers' => $customers, 
            'employees' => $employees, 
            'vehicles'=>$vehicles,
            'maintenances'=> $maintenances]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Excelente, Tu Reservación se ha actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservación eliminada.');
    }
}
