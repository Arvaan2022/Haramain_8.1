<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'txtCategory' => ['required'],
            'txtCategoryArabic' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'txtCategory.required' => trans('admin.category_name_english'),
            'txtCategoryArabic.required' => trans('admin.category_name_arabic'),
        ];
    }
}
