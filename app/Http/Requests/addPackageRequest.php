<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addPackageRequest extends FormRequest
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
            'name'=>'required|string',
            'price'=>'required|integer',
            'description'=>'required|string',
            'plan_info'=>'required|string',
        ];
    }

    public function message()
    {
        return [
            //
            'name.required'=>'The name field is required',
            'name.string'=>'the name field must be string',
            'price.required'=>'The price is required',
            'price.integer'=>'The price field must be integer',
            'description.required'=>'The description field is required',
            'description.string'=>'The description field must be string',
            'plan_info.required'=>'The plan information field is required',
            'plan_info.string'=>'The plan information field must be string',
        ];
    }
}
