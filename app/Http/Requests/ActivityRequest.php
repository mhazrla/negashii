<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'title' => 'required|string',
            'date' => 'required|string',
            'subtitle1' => 'required|string',
            'subtitle1' => 'required|string',
            'desc1' => 'required|string',
            'desc2' => 'nullable|string',
            'image1' => 'image|required',
            'image2' => 'image|nullable',
        ];
    }
}
