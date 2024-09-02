<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|required|exists:tags,id',
        ];
    }

        public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'title.string' => 'Title must be a string.',
            'content.required' => 'Content is required.',
            'content.string' => 'Content must be a string.',
            'preview_image.required' => 'Image is required.',
            'preview_image.file' => 'Image must be a file.',
            'main_image.required' => 'Image is required.',
            'main_image.file' => 'Image must be a file.',
            'category_id.required' => 'Category is required.',
            'category_id.integer' => 'Category must be an integer.',
            'category_id.exists' => 'Category does not exist.',
            'tag_ids.required' => 'Tag is required.',
            'tag_ids.array' => 'Tag must be an array.',
            'tag_ids.*.exists' => 'Tag does not exist.',
        ];
    }
}
