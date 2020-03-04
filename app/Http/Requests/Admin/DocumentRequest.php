<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class DocumentRequest extends Request
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
        $rules = [];
        $rules['document_name'] = 'required';
        $nbr = count($this->file('txtDoc')) - 1;
        foreach (range(0, $nbr) as $index) {
            //$rules['txtDoc.' . $index] = 'required|mimes:xls,xlsx,txt,doc,docx,pdf,jpeg,jpg,png|max:20000';
             $rules['txtDoc.' . $index] = 'required|max:20000';
        }
        return $rules;
    }
}
