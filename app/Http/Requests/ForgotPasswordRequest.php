<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ForgotPasswordRequest extends Request {

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
            'email' => 'required|email|exists:users,email'
        ];
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
        return [
                'email.required' => 'Email is required.',
                'email.email' => 'Email must be a valid email address.',
                'email.exists' => 'Email is not exist.Please enter registered email.'
        ];
    }

}
