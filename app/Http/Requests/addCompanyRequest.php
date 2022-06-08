<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCompanyRequest extends FormRequest
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
            'username'=>'required|string',
            'email'=>'unique:users|email|required',
            'password'=>'min:5|required',
            'balance'=>'required|integer',
        ];
    }

    public function message()
    {
        return [
            //
            'name.required'=>'name field is required',
            'name.string'=>'name field must be string',
            'email.required'=>'email field is required',
            'email.unique'=>'email field is taken before',
            'email.required'=>'email field is required',
            'password.required'=>'password field is required',
            'password.min'=>'please enter more than 5 characters',
            'balance.required'=>'balance field is required',
            'balance.integer'=>'balance field must be a number',
        ];
    }
}
