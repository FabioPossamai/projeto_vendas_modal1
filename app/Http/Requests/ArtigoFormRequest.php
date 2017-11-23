<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtigoFormRequest extends FormRequest
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
        return ['categoria_id'=>'required','codigo'=>'required|max:50','nome'=>'required|max:100','estoque'=>'required|numeric',
            'descricao'=>'max:512','image'=>'mimes:jpg,bmp,png',
            //
        ];
    }
}
