<?php

namespace Multipol\Http\Requests;

use Multipol\Http\Requests\Request;

class AccionCriteriosFormRequest extends Request
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
            'peso'=>'required|max:45',
        'promedio_ponderados'=>'required|max:100',
        'mayor'=>'required',
        'desviacion'=>'required'
        ];
    }
}
