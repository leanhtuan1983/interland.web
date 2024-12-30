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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'title' => 'required|string|max:250',
        'category_id' => 'required|integer|exists:categories,id',
        'summary' => 'nullable|string',
        'content' => 'required|string',
        'page_id' => 'required|integer|exists:pages,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ];
    }
}
