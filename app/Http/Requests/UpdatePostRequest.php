<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'canonical' => 'required|unique:routers,canonical,'.$this->id.',module_id',
            'post_catalogue_id' => 'gt:0',
            'catalogue' => ['nullable', 'array'], // Không bắt buộc, nhưng nếu có thì phải là mảng
            'catalogue.*' => ['integer', 'gt:0'], // Mỗi phần tử phải là số nguyên và > 0 nếu có
        ];  
    }

    public function messages(): array
    {
        return [
            'name.required' => __('requests.updatePostRequest.name.required'),
            'canonical.required' => __('requests.updatePostRequest.canonical.required'),
            'canonical.unique' => __('requests.updatePostRequest.canonical.unique'),
            'post_catalogue_id.gt' => __('requests.updatePostRequest.post_catalogue_id.gt'),
            'catalogue.array' => __('requests.updatePostRequest.catalogue.array'),
            'catalogue.*.integer' => __('requests.updatePostRequest.catalogue.integer'),
            'catalogue.*.gt' => __('requests.updatePostRequest.catalogue.integer'),
        ];
    }
}
