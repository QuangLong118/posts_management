<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name' => 'required',
            'canonical' => 'required|unique:routers',
            'post_catalogue_id' => 'gt:0', 
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('requests.storePostRequest.name.required'),
            'canonical.required' => __('requests.storePostRequest.canonical.required'),
            'canonical.unique' => __('requests.storePostRequest.canonical.unique'),
            'post_catalogue_id.gt' => __('requests.storePostRequest.post_catalogue_id.gt'),
        ];
    }
}
