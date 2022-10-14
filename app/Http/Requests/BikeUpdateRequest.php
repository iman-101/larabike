<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

class BikeUpdateRequest extends BikeRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update',$this->route('bike'));
    }

    protected  function failedAuthorization(){
        
        throw new AuthorizationException('No puedes modificar una moto que no es tuya');
        
    }
    
    public function rules()
    {
        
        $id = $this->bike->id;
        return [
            'matricula'=>"required_if:matriculada,1|
                         nullable|
                        regex:/^\d{4}[B-Z]{3}$/i|
                         unique:bikes,matricula,$id"
        ]+parent::rules();
    }
}
