<?php

namespace App\Http\Requests\Comics;

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
    public function rules()
    {
        return [
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'tags' => 'array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'required|url|max:200',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название комикса обязательно для заполнения',
            'title.max' => 'Название не должно превышать 150 символов',
            'link.required' => 'Ссылка на комикс обязательна для заполнения',
            'link.url' => 'Укажите корректную ссылку',
            'link.max' => 'Название не должно превышать 200 символов',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Допустимые форматы изображения: JPEG, PNG, JPG, WEBP',
            'image.max' => 'Максимальный размер изображения 2MB',
        ];
    }
}
