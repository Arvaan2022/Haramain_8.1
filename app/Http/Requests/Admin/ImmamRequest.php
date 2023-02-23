<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ImmamRequest extends FormRequest
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
            'imaam_en' => ['required'],
            'imaam_ar' => ['required'],
            'imaam_description_en' => ['required'],
            'imaam_description_ar' => ['required'],
            'category_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'imaam_en.required' => trans('admin.immam_en_name_req'),
            'imaam_ar.required' => trans('admin.immam_ar_name_req'),
            'imaam_description_en.required' => trans('admin.imaam_description_en_req'),
            'imaam_description_ar.required' => trans('admin.imaam_description_ar_req'),
            'category_id.required' => trans('admin.select_mosque'),
        ];
    }
}