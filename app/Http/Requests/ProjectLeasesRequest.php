<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectLeasesRequest extends FormRequest
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
            'bzj' => 'required',
            
        ];
    }


    public function messages()
    {
        $message = [
            'title.required'      =>'项目名称必须填写！',
            'pubDays.required'      =>'项目名称必须填写！',
            'gpjg.required'      =>'预算价格必须填写！',
            'bzj.required'      =>'竞标保证金金额必须填写！',
        ];
        return $message;
    }

}
