<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class subHeadingRequest extends FormRequest
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
            "gps_place_en" => 'required',
            "gps_place_ar" => 'required',
            "latitude" => 'required',
            "longitude" => 'required',
        ];
    }
    public function messages()
    {
        return [
            "gps_place_en.required" => trans('admin.gps_place_en_req'),
            "gps_place_ar.required" => trans('admin.gps_place_ar_req'),
            "latitude.required" => trans('admin.gps_latitude_req'),
            "longitude.required" => trans('admin.gps_longitude_req'),
        ];
    }
}
