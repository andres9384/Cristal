<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return true;
        // if($this->id_usuario == auth()->user()->id){
        //     return true; 
        // }else{
        //     return false;
        // }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $post= $this->route()->parameter("publicacione");

        $rules=[
            "nombre"=>"required",
            "ficha"=>"required|unique:publicacions",
            "estados"=>"required|in:1,2",
            "file"=>"image"
        ];
        if($post){
            $rules["ficha"] = "required|unique:publicacions,ficha," . $post->id;
        }
        if($this->estados == 2){
            $rules= array_merge($rules,[
                "id_categoria"=>"required",
                "etiqueta"=>"required",
                "extracto"=>"required",
                "cuerpo"=>"required"
            ]);
        }
        return $rules;
    }
}
