<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_en'       => ['required'],
            'category_ar'       => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'category_en.required'   => trans('admin.enter_mosque_en_name_req'),
            'category_ar.required'   => trans('admin.enter_mosque_ar_name_req'),
        ];
    }
}
