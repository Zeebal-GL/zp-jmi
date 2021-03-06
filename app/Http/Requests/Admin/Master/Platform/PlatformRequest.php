<?php

namespace App\Http\Requests\Admin\Master\Platform;

use App\Http\Requests\Request;

class PlatformRequest extends Request {

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
        $rules['name'] = 'required';
        $rules['status'] = 'required';
        return $rules;
    }

    

}
