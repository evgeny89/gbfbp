<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255|',
            'price' => 'required|integer|numeric|min:1',
            'weight' => 'string|min:3|max:255|nullable',
            'description' => 'string|min:3|nullable',
            'shop_id' => 'exclude',
            'category_id' => 'required|exists:categories,id',
            'material_id' => 'required|exists:materials,id',
            'delete_images' => 'array|nullable',
            'delete_images.*' => 'string',
            'file_name' => 'array|nullable',
            'file_name.*' => 'image|file|mimes:jpg,png,jpeg,gif|max:4096',
        ];
    }
}
