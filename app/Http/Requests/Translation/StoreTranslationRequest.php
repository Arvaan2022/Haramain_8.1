<?php

namespace App\Http\Requests\Translation;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TranslationUnique;

class StoreTranslationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
   public function rules()
    {
        return [
            'key' => [
                'required', 'unique:language_lines,key',
                'regex:/^[A-Za-z0-9&_.]*$/',
                new TranslationUnique(trans('admin.translation_key_unique_validation_required')),
            ],
            'text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'key.required' => trans('admin.translation_key_validation_required'),
            'key.unique' => trans('admin.translation_key_unique_validation_required'),
            'text.required' => trans('admin.translation_text_validation_required'),
        ];
    }
}
