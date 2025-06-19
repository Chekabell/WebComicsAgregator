<?php

namespace App\Http\Requests\Comics;

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
    public function rules()
    {
        return [
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 2),
            'tags' => 'array',
            'type_comics' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'required|url|max:200',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название комикса обязательно для заполнения',
            'title.max' => 'Название не должно превышать 150 символов',
            'year.required' => 'Год выпуска обязателен для заполнения',
            'year.min' => 'Год выпуска не может быть раньше 1900',
            'year.max' => 'Год выпуска не может быть далеко в будущем',
            'type_comics.required' => 'Тип комикса обязателен для заполнения',
            'type_comics.max' => 'Название не должно превышать 100 символов',
            'link.required' => 'Ссылка на комикс обязательна для заполнения',
            'link.url' => 'Укажите корректную ссылку',
            'link.max' => 'Ссылка не должна превышать 200 символов',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Допустимые форматы изображения: JPEG, PNG, JPG, WEBP',
            'image.max' => 'Максимальный размер изображения 2MB',
        ];
    }
}
