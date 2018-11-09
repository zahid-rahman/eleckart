<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class vendorRequest extends FormRequest
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
        return [
            //
            'email'=>'required|email|unique:users',
            'v_pass'=>'required|min:6',
            'v_address'=>'required|string',
            'v_phone'=>'required|max:11',
            'v_com_name'=>'required|string',
            'v_role'=>'required|string'
        ];
    }
}
