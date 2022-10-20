<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;

class BikeDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('delete',$this->bike);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    
    protected function failedAuthorization(){
        
        throw new AuthorizationException('No puedes eliminar una moto no es tuya.');
    }
    
    
    
    public function rules()
    {
        return [
            //
        ];
    }
}
