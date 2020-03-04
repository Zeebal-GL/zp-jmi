<?php

namespace App\Http\Requests\Admin\Master\Conversion;

use App\Http\Requests\Request;

class ConversionRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {        
        $rules['from_currency'] = 'required';
        $rules['to_currency'] = 'required';
        $rules['rate'] = 'required';
        $rules['status'] = 'required';
        return $rules;
    }

    

}
