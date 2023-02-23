<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoSubcategoryRequest extends FormRequest
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
            'subCatName' => ['required'],
            'subCatArabic' => ['required'],
            'subCatLink' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'subCatName.required' => trans('admin.category_name_english'),
            'subCatArabic.required' => trans('admin.category_name_arabic'),
            'subCatLink.required' => trans('admin.redirect_link'),
        ];
    }
}
