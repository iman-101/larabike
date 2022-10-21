<?php

namespace App\Http\Requests;
//use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ApiCreateBikeRequest extends BikeRequest
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
        return ['matricula'=>'required_if:matriculada,1|
            nullable|
            regex:/^\d{4}[ABCDFGHJKLMNOPQRSTUVWXYZ]{3}$/i|
            unique:bikes']+parent::rules();
            
        
    }
    
    protected function failedValidation(Validator $validator){
        
        $response = response([
            'status'=>'ERROR',
            'message'=>'No se supraron los criterios de validatión.',
            'errors'=>$validator->errors()
        ],422);
        
        throw new ValidationException($validator,$response);
    }
}
