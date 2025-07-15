<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => ['required', 'max:20'],
            'tag' => ['required'],
            'description' => ['required', 'max:100']

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The post title is required.',
            'title.max' => 'The post title must not be more than 20 characters.',

            'tag.required' => 'Please select a tag for the post.',

            'description.required' => 'The post description is required.',
            'description.max' => 'The post description must not exceed 100 characters.',
        ];
    }
}
