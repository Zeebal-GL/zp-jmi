<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class MemberRequest extends Request
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
        $rules['name']     = 'required';
        $rules['email']    = 'required|email|unique:users,email,'.$this->member_id;
        $rules['mobile']   = 'required';
        
        if (empty($this->member_id) || empty($this->password) || empty($this->confirm_password)) {
            $rules['password']         = 'required';
            $rules['confirm_password'] = 'required|same:password';
        }
        $rules['username'] = 'required|unique:users,username,'.$this->member_id;
        $rules['office_phone'] = 'required';
        $rules['role']            = 'required';
        
         
        return $rules;
    }

    function messages()
    {
        $rules['username.required']       = 'The employee id field is required';
        $rules['username.unique']         = 'The employee id has already been taken';
        $rules['role.required']           = 'The member type field is required';
        return $rules;
    }
}