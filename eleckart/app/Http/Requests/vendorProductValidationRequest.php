<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class vendorProductValidationRequest extends FormRequest
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
            'pro_name'=>'required|string',
            'pro_desc'=>'required|string',
            'pro_img_up'=>'required|mimes:jpeg,png,jpg|max:4096',
            'pro_qun'=>'required',
            'pro_price'=>'required',
            'brand_name'=>'required',
            'offer'=>'required',
            'c_name'=>'required'
        ];
    }
}
