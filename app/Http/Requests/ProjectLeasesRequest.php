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
            'wtf_name' => 'required',
            'title' => 'required',
        ];
    }


    public function messages()
    {
        $message = [
            'wtf_name.required'      =>'委托方名称必须填写！',
            'title.required'      =>'项目名称必须填写！'
        ];
        return $message;
    }

}
