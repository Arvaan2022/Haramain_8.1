<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\MessageBag;

class mainHeadingRequest extends FormRequest
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
            "gps_heading_en" => 'required',
            "gps_heading_ar" => 'required',
        ];
    }

    public function messages()
    {
        return [
            "gps_heading_en.required" => trans('admin.gps_heading_en_req'),
            "gps_heading_ar.required" => trans('admin.gps_heading_ar_req'),
        ];
    }


}