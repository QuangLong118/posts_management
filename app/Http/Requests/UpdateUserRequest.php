<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users,email, '.$this->id.'|max:191',
            'name' => 'required|string',
            'user_catalogue_id' => 'gt:0',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('requests.updateUserRequest.email.required'),
            'email.email' => __('requests.updateUserRequest.email.email'),
            'email.unique' =>__('requests.updateUserRequest.email.unique'),
            'email.string' => __('requests.updateUserRequest.email.string'),
            'email.max' => __('requests.updateUserRequest.email.max'),
            'name.required' =>__('requests.updateUserRequest.name.required'),
            'name.string' => __('requests.updateUserRequest.name.string'),
            'user_catalogue_id.gt' => __('requests.updateUserRequest.user_catalogue_id.gt'),
        ];
    }
}
