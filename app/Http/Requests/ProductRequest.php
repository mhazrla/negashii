<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|string',
            'qty' => 'required|integer',
            'image_1' => 'image|required',
            'image_2' => 'image|nullable',
            'image_3' => 'image|nullable',
            'desc' => 'required|string',
            'category_id' => 'required|string',
        ];
    }
}
