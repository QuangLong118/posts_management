<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users|max:191',
            'name' => 'required|string',
            'user_catalogue_id' => 'gt:0',
            'password' => 'required|string|min:6',
            're_password' => 'required|same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' =>  __('requests.storeUserRequest.email.required'),
            'email.email' =>  __('requests.storeUserRequest.email.email'),
            'email.unique' =>  __('requests.storeUserRequest.email.unique'),
            'email.string' =>  __('requests.storeUserRequest.email.string'),
            'email.max' =>  __('requests.storeUserRequest.email.max'),
            'name.required' =>  __('requests.storeUserRequest.name.required'),
            'name.string' =>  __('requests.storeUserRequest.name.string'),
            'user_catalogue_id.gt' =>  __('requests.storeUserRequest.user_catalogue_id.gt'),
            'password.required' =>  __('requests.storeUserRequest.password.required'),
            're_password.required' =>  __('requests.storeUserRequest.re_password.required'),
            're_password.same' =>  __('requests.storeUserRequest.re_password.same'),
        ];
    }
}
