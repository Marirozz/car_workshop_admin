<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
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
            'brand_id' => 'required|string|max:20',
            'car_model_id' => 'required|string|max:20',
            'year' => 'required|numeric',
            'license_plate' => 'required|string|max:7',
            'token' => 'nullable|string|max:5',
            'mileage' => 'required|numeric',
        ];
    }
}
