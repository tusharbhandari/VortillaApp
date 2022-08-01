<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|string|email|max:100|unique:logins',
            'password' => 'required|string|confirmed|min:6',
            'address.name' => 'required|min:3|string|max:100',
            'address.street1' => 'required|min:3|string',
            'address.street2' => 'min:3|string',
            'address.street3' => 'min:3|string',
            'address.postcode' => 'required|integer',
            'address.city' => 'required|string',
            'address.state' => 'required|string',
            'address.country' => 'required|string',
        ];
    }
}
