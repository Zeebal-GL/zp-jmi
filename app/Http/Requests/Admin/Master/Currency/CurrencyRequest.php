<?php

namespace App\Http\Requests\Admin\Master\Currency;

use App\Http\Requests\Request;

class CurrencyRequest extends Request {

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
        $rules['country_id'] = 'required';     
        $rules['name'] = 'required|unique:mst_currency,name,'.$this->var_id;
        $rules['code'] = 'required|unique:mst_currency,code,'.$this->var_id;
        $rules['status'] = 'required';
        return $rules;
    }

    function messages()
    {
        $rules['name.required']       = 'The name field is required';
        $rules['name.unique']         = 'The currency name has already been taken';
        $rules['code.required']       = 'The name field is required';
        $rules['name.unique']         = 'The currency name has already been taken';
        return $rules;
    }

    

}
