<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class ProjectRequest extends Request {

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
   return [];
        $rules['project_ID'] = 'required|unique:tbl_project,project_ID,'.$this->var_id;
        $rules['name'] = 'required';
        $rules['company_id'] = 'required';
        $rules['plateform_id'] = 'required';
        $rules['onborad_date'] = 'required';
        $rules['duration_no'] = 'required';
        $rules['duration_type'] = 'required';
        // $rules['technology_id'] = 'required';
        $rules['currency_id'] = 'required';
        $rules['amount'] = 'required';
        // $rules['moc_id'] = 'required';
        // $rules['status'] = 'required';
        return $rules;
    }

    

}
