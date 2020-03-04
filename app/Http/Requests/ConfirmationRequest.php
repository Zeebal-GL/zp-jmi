<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfirmationRequest extends Request
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
        $rules                  = [];
        $rules['name']          = 'required|regex:/^[a-z" "]+$/i|min:2|max:30';
        $rules['legel_name']    = 'required|min:2|max:100';
        $rules['bill_addr_one'] = 'required';
        $rules['bill_state_id'] = 'required|numeric';
        $rules['bill_city_id']  = 'required|numeric';
        $rules['bill_pin_code'] = 'required|digits:6';

        if (empty($this->request->get('is_ship_same_as_bill')) && !($this->request->get('is_ship_same_as_bill'))) {
            $rules['ship_addr_one'] = 'required';
            $rules['ship_state_id'] = 'required|numeric';
            $rules['ship_city_id']  = 'required|numeric';
            $rules['ship_pin_code'] = 'required|digits:6';
        }
        $rules['phone_one'] = 'required|numeric|digits:10';
        $rules['phone_two'] = 'numeric|digits:10';
        $rules['is_gst']    = 'numeric|in:0,1';

        if ($this->request->get('is_gst') && $this->request->get('is_gst') == 1) {
            $rules['dealer_type']    = 'required|in:1,2';
            $rules['tin_gst_number'] = 'required|min:15:max:15';
           // $rules['tin_gst_file']   = 'required';
        }
        $rules['aadhar_number']      = 'required|digits:12';
      //  $rules['pan_number_file']    = 'required|mimes:jpeg,bmp,png';
       // $rules['aadhar_number_file'] = 'required|mimes:jpeg,bmp,png';
        //$rules['visiting_card']      = 'required|mimes:jpeg,bmp,png';


        return $rules;
    }

    /**
     *  Validation messages
     *
     *  @return array
     */
    public function messages()
    {

        $message                  = [];
        $message['name.required'] = trans('error_message.req_name');
        $message['name.regex']    = trans('error_message.req_name_regex');
        $message['name.min']      = trans('error_message.req_name_min');
        $message['name.max']      = trans('error_message.req_name_max');

        $message['legel_name.required'] = trans('error_message.req_legel_name');
        $message['legel_name.min']      = trans('error_message.legel_name_min');
        $message['legel_name.max']      = trans('error_message.legel_name_max');

        $message['bill_addr_one.required'] = trans('error_message.req_bill_addr_one');
        $message['bill_state_id.required'] = trans('error_message.req_bill_state_id');
        $message['bill_state_id.numeric']  = trans('error_message.bill_state_id_number');

        $message['bill_city_id.required'] = trans('error_message.req_bill_city_id');
        $message['bill_city_id.numeric']  = trans('error_message.bill_city_id_number');

        $message['bill_pin_code.required'] = trans('error_message.req_bill_pin_code');
        $message['bill_pin_code.digits']   = trans('error_message.req_bill_pin_code_digits');

        if (empty($this->request->get('is_ship_same_as_bill')) && !($this->request->get('is_ship_same_as_bill'))) {
            $message['ship_addr_one.required'] = trans('error_message.req_ship_addr_one');
            $message['ship_state_id.required'] = trans('error_message.req_ship_state_id');
            $message['ship_state_id.numeric']  = trans('error_message.ship_state_id_num');
            $message['ship_city_id.required']  = trans('error_message.req_ship_city_id');
            $message['ship_city_id.numeric']   = trans('error_message.ship_city_id_numeric');
            $message['ship_pin_code.required'] = trans('error_message.req_ship_pin_code');
            $message['ship_pin_code.digits']   = trans('error_message.ship_pin_code_digits');
        }
        $message['phone_one.required'] = trans('error_message.req_phone_one');
        $message['phone_one.numeric']  = trans('error_message.phone_one_number');
        $message['phone_one.digits']   = trans('error_message.req_phone_one_digits');
        $message['phone_two.numeric']  = trans('error_message.phone_two_number');
        $message['phone_two.digits']   = trans('error_message.req_phone_two_digits');
        $message['is_gst.numeric']     = trans('error_message.req_is_gst');
        $message['is_gst.in']          = trans('error_message.req_is_gst_in');

        if ($this->request->get('is_gst') && $this->request->get('is_gst') == 1) {
            $message['dealer_type.required']    = trans('error_message.req_dealer_type');
            $message['dealer_type.in']          = trans('error_message.req_dealer_type_in');
            $message['tin_gst_number.required'] = trans('error_message.req_gst_number');
            $message['tin_gst_number.min']      = trans('error_message.req_gst_number_min');
            $message['tin_gst_number.max']      = trans('error_message.req_gst_number_max');
            $message['tin_gst_file']            = trans('error_message.req_gst_file');
        }
        $message['pan_number.required'] = trans('error_message.req_pan_number');
        $message['pan_number.regex']    = trans('error_message.req_pan_number_regex');

        $message['aadhar_number.required'] = trans('error_message.req_aadhar_number');
        $message['aadhar_number.digits']   = trans('error_message.aadhar_number_digits');

        $message['pan_number_file.required']    = trans('error_message.req_pan_number_file');
        $message['pan_number_file.mimes']       = trans('error_message.req_pan_number_file_image');
        $message['pan_number_file.size']        = trans('error_message.req_pan_number_file_size');
        $message['aadhar_number_file.required'] = trans('error_message.req_aadhar_number_file');
        $message['aadhar_number_file.mimes']    = trans('error_message.req_aadhar_number_file_image');
        $message['aadhar_number_file.size']     = trans('error_message.req_aadhar_number_file_size');
        $message['visiting_card.required']      = trans('error_message.req_visiting_card');
        $message['visiting_card.mimes']         = trans('error_message.req_visiting_card_image');
        $message['visiting_card.size']          = trans('error_message.req_visiting_card_size');


        return $message;
    }
}