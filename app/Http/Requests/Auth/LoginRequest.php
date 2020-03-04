<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
        $ruleForLogin      = filter_var($this->request->get('email'),
                FILTER_VALIDATE_EMAIL) ? 'required|email' : 'required|numeric|digits:10';
        $rules['email']    = $ruleForLogin;
        $rules['password'] = 'required';
        
        return $rules;
    }

    function messages()
    {
        $messages = [];
        if (filter_var($this->request->get('login'), FILTER_VALIDATE_EMAIL)) {
            $messages['email.required'] = trans('error_message.req_email_mobile');
            $messages['email.email']    = trans('error_message.email_valid');
            $messages['email.exists']   = trans('error_message.email_not_exist');
        } else {
            $messages['email.required'] = trans('error_message.req_email_mobile');
            $messages['email.numeric']  = trans('error_message.mobile_valid');
            $messages['email.digits']   = trans('error_message.mobile_valid_digits');
            $messages['email.exists']   = trans('error_message.mobile_not_exist');
        }
        $messages['password.required'] = trans('error_message.req_login_password');
        
        return $messages;
    }
}