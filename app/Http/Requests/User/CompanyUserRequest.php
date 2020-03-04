<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class CompanyUserRequest extends Request {

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
        $rules['address'] = 'required';
        $rules['office_phone'] = 'required';
       // $rules['emp_id'] = 'required|unique:users,emp_id,' . $this->user_id;  
        $rules['username'] = 'required|unique:users,username,'.$this->user_id; 
        $rules['name'] = 'required';
        $rules['email'] = 'required|email|unique:users,email,' . $this->user_id;        
        if (empty($this->user_id)) {
            $rules['password'] = 'required|confirmed|min:6';
        }
        $rules['mobile'] = 'required';
        $rules['role'] = 'required';
        $rules['status'] = 'required';
        return $rules;
    }

    function messages()
    {
        $rules['username.required']       = 'The employee id field is required';
        $rules['username.unique']         = 'The employee id has already been taken';
          
        return $rules;
    }
}
