<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEntityRequest extends FormRequest
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
            'entity_name' => 'required|string|max:255',
            'entity_type' => 'required|string|max:255',
            'entity_register_number' => 'required|string|max:255',
            'entity_register_country' => 'required|string|max:255',
            'entity_tax' => 'nullable|string|max:255',
            'first_name' => 'required|regex:/^[A-Za-z. ]{2,255}$/',
            'last_name' => 'required|regex:/^[A-Za-z. ]{2,255}$/',
            'email' => 'required|email|max:256|unique:users',
            'password' => 'required|min:8|max:80',
            'forumn' => 'required|alpha_num|max:200',
            'telegram' => 'nullable|regex:/^[A-Za-z_@]{2,255}$/',
        ];
    }
}