<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'postal_address' => 'required',
            'physical_address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'Fist name is required',
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
            'last_name.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid format email',
            'postal_address.required' => 'Postal address is required',
            'physical_address.required' => 'Physical address is required',
        ];
    }
}
