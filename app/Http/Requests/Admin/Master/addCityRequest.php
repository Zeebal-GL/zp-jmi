<?php

namespace App\Http\Requests\Admin\Master;

use App\Http\Requests\Request;

class addCityRequest extends Request {

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

        return [
            'country_id' => 'required',
            'state_id' => 'required',
            'name' => 'required',
        ];
    }

}
