<?php

namespace App\Http\Requests\Admin\AccessManagement;

use App\Http\Requests\Request;

class AclRequest extends Request {

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
        $rules['permissions_parent'] = 'required';
        return $rules;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
        $msg['permissions_parent.required'] = 'Please select at least one checkbox';
        return $msg;
    }



}
