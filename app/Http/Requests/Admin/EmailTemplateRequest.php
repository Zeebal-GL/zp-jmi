<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class EmailTemplateRequest extends Request
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
        return ['name.required' => 'The template name is required'];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'to' => 'required',            
            'template_code' => 'required|unique:tbl_email_template,template_code,'.$this->id,
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'status' => 'required',
            'attachment.*' => 'mimes:doc,docx,pdf,xls,jpeg,png'
        ];
    }
}