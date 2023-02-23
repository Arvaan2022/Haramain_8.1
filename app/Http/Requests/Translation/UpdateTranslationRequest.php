<?php

namespace App\Http\Requests\Translation;

use Illuminate\Foundation\Http\FormRequest;


class UpdateTranslationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => trans('admin.translation_text_validation_required'),
        ];
    }
}
