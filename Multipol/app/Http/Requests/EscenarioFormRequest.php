<?php

namespace Multipol\Http\Requests;

use Multipol\Http\Requests\Request;

class EscenarioFormRequest extends Request
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
            'titulo_corto'=>'required|max:45',
        'titulo_largo'=>'required|max:100',
        'peso'=>'required'
        ];
    }
}
