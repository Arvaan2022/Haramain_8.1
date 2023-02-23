<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'sub_category_en' => ['required'],
            'sub_category_ar' => ['required'],
            'sub_category_urdu' => ['required'],
            'category_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'sub_category_en.required' => trans('admin.mosque_name_req'),
            'sub_category_ar.required' => trans('admin.mosque_urdu_name_req'),
            'sub_category_urdu.required' => trans('admin.mosque_arabic_name_req'),
            'category_id.required' => trans('admin.select_mosque_category'),
        ];
    }

}