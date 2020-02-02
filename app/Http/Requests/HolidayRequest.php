<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:4|max:20',
            'start' => 'required',
            'is_daily' => 'required',
            'end' => 'required_if:is_daily,==,0',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان را وارد کنید',
            'title.min' => 'عنوان وارد شده باید بیشتر از 4 کاراکتر باشد',
            'title.max' => 'عنوان وارد شده باید کمتر از 20 کاراکتر باشد',
            'start.required' => 'تاریخ شروع را انتخاب کنید',
            'end.required_if' => '  تاریخ پایان را انتخاب کنید',
            'is_daily.required' => 'نوع تعطیلی را انتخاب کنید',

        ];
    }
}
