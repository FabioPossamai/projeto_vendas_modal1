<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RendaFormRequest extends FormRequest
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
        return ['pessoa_id'=>'required','tipo_comprovante'=>'required|max:20','serie_comprovante'=>'required|max:7',
            'num_comprovante'=>'required|max:10','artigo_id'=>'required','quantidade'=>'required','preco_compra'=>'required',
            'preco_venda'=>'required'
        ];
    }
}
