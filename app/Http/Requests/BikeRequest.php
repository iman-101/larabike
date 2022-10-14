<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BikeRequest extends FormRequest
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

    
    public function rules()
    {
        return [
            'marca'=>'required|max:255',
            'modelo'=>'required|max:255',
            'precio'=>'required|numeric|min:0',
            'kms'=>'required|integer|min:0',
            'matriculada'=>'required_with:matricula',
            'matricula'=>"required_if:matriculada,1|
                         nullable|regex:/^\d{4}[B-Z]{3}$/i|
                         unique:bikes|
                        ,confirmed",
            'color'=>'nullable|regex:/^#[\dA-F]{6}$/i',
            'imagen'=>'sometimes|file|image|mimes:jpg,png,gif,webp|max:2048'
        ];
    }
    
    public function messages(){
        
        return [
            'precio.numeric'=> 'El  precio debe ser un número',
            'precio.min'=> 'El  precio debe ser mayor o igual a cero',
            'kms.numeric'=> 'Los kilometros deben ser un número',
            'kms.min'=> 'Los kilometros deben ser 0 o más',
            'matricula.required_if'=>'La matricula es obligatoria si la moto está matriculada',
            'matricula.unique'=>'Ya existe una moto con la misma matricula',
            'matricula.regex'=>'La matricula debe contener cuatro digitos y tres letras.',
            'matricula.confirmed'=>'La confirmacion de matriiculano coincide',
            'color.regex'=>'El color debe estar en formato RGB HEX comenzando por #.',
            'imagen.image'=>'El fichero debe ser una imagen',
            'imagen.mines'=>'La imagen debe ser de tipo jpg,png,gif o webp.',
        ];

        
        
    }
}
