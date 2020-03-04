<?php

namespace App\Http\Requests\Admin\Master;

use App\Http\Requests\Request;

class TagsRequest extends Request {

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
        $id = $this->request->get('id');
        $rules['name'] = 'required|unique:tbl_tags,name,'.$id;
        $rules['status'] = 'required';
        return $rules;
    }

}
