<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostCatalogueRequest extends FormRequest
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
            'parent_id' => 'gte:0'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' =>  __('requests.storePostCatalogueRequest.name.required'),
            'canonical.required' =>  __('requests.storePostCatalogueRequest.canonical.required'),
            'canonical.unique' =>  __('requests.storePostCatalogueRequest.canonical.unique'),
            'parent_id.gte' => __('requests.storePostCatalogueRequest.parent_id.gte'),
        ];
    }
}
