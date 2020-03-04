<?php

namespace App\Http\Requests\UserProfile;

use App\Http\Requests\Request;

class PasswordRequest extends Request
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
        $rules['old_password']    = 'required';
        $rules['password'] = 'required|min:6';
        $rules['confirm_password']  = 'required|same:password';
        return $rules;
    }

    /*function messages()
    {
        
    }*/
}