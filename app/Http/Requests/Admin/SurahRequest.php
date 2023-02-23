<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SurahRequest extends FormRequest
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
            'surah_name' => ['required'],
            'category_id' => ['required'],
            'sub_category_id' => ['required'],
            'imaam_id' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'surah_name.required' => trans('admin.surah_name_req'),
            'category_id.required' => trans('admin.select_mosque'),
            'sub_category_id.required' => trans('admin.select_sub_mosque'),
            'imaam_id.required' => trans('admin.select_imaam_req'),
            
        ];
    }
}
