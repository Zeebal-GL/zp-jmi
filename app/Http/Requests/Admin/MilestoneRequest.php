<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class MilestoneRequest extends Request {

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
        $rules['milestone_name'] = 'required';
        $rules['milestone_description'] = 'required';
        $rules['milestone_start_date'] = 'required';
        $rules['milestone_end_date'] = 'required';
        $rules['milestone_payment_amount'] = 'required';
        $rules['milestone_payment_date'] = 'required';
        $rules['milestone_status'] = 'required';
        return $rules;
    }

    

}
