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
            'name' => 'required|string|max:150',
            'type' => 'required|string|max:50',
            'cost' => 'required|numeric',
            'typeFrequency' => 'required|string|max:100',
            'frequency' => 'required|numeric',
            'monthsFrequency'=>'required|numeric',
            'duration' => 'required|numeric',
            'brand_id' => 'required|string|max:20',
            'car_model_id' => 'required|string|max:20',
            
        ];
    }
}
