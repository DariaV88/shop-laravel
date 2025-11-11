<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required',
            'article' => 'required',
            'preview_image' => 'required|image',
            'price' => 'required|numeric',
            'category_id' => 'nullable|numeric',
            'tags' => 'nullable|array',
            'colours' => 'nullable|array',
            'new' => 'numeric',
            'hit' => 'numeric',
        ];
    }
}
