<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'title' => 'required|min:3|max:20|unique:roles,title|regex:/^[\pL\s\-]+$/u',
            ];
        } else return [
            'title' => 'required|min:3|max:20|regex:/^[\pL\s\-]+$/u',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان اجباری است',
            'title.min' => 'عنوان وارد شده باید بیشتر از34 کاراکتر باشد',
            'title.max' => 'عنوان وارد شده باید کمتر از 20 کاراکتر باشد',
            'title.unique' => 'عنوان وارد شده  تکراری می باشد',
            'title.regex' => 'عنوان وارد شده صحیح نمی باشد',
        ];

    }
}
