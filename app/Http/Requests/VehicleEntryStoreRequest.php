<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleEntryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|string|max:20',
            'details'=>'required|string',
            'traveled'=>'required|numeric',
            'type_traveled'=>'required',
            'entry_date'=>'date|required',
            'departure_date'=>'nullable|date',
            'vehicle_id' => 'required|string|max:20',
            'maintenance_id' => 'nullable|string|max:20',
            'employee_id' => 'required|string|max:5',
            'reservation_id' => 'nullable|numeric',
        ];
    }
}
