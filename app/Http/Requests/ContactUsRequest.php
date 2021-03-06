<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactUsRequest extends Request
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
    public function messages()
    {
        return [
            'comment.required' => 'The message field is required.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'comment' => 'required',
        ];
    }
}