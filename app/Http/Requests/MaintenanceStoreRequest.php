<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceStoreRequest extends FormRequest
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
            'name' => 'required|text',
            'type' => 'required|string|max:50',
            'costo' => 'required|numeric',
            'frecuency' => 'required|string|100',
            'duration' => 'required|string|100',
            'brand_id' => 'required|string|max:20',
            'car_model_id' => 'required|string|max:20',
            
        ];
    }
}
