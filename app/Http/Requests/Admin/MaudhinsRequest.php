<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaudhinsRequest extends FormRequest
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
            'maudhins_en' => ['required'],
            'maudhins_ar' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'maudhins_en.required' => trans('admin.maudhins_name_req'),
            'maudhins_ar.required' => trans('admin.maudhins_ar_name_req'),
            'category_id.required' => trans('admin.select_mosque'),
            'sub_category_id.required' => trans('admin.select_sub_mosque'),
        ];
    }
}