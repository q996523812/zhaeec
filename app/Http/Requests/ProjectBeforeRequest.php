<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectBeforeRequest extends FormRequest
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
            'title' => 'required',
            'pubDays' => 'required',
            'gpjg' => 'required',
            'sfqzypl' => 'required',
        ];
    }

    public function messages()
    {
        $message = [
            'title.required'      =>'项目名称必须填写！',
            'pubDays.required'      =>'挂牌期限必须填写！',
            'gpjg.required'      =>'转让底价必须填写！',
            'sfqzypl.required'      =>'是否强制预披露必须填写！',
        ];
        return $message;
    }

}
