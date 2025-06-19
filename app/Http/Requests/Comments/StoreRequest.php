<?php

namespace App\Http\Requests\Comments;

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
            'content' => 'required|string',
            'user_id' => 'required|numeric|exists:users,id',
            'comics_id' => 'required|numeric|exists:comics,id'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Зачем оставлять пустой комментарий?',
            'user_id.required' => 'Id пользователя потерялся по пути',
            'comics_id.required' => 'Id комикса потерялся по пути',
        ];
    }
}
