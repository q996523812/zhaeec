<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinancialStatementRequest extends FormRequest
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
            'type' => 'required',
            'statement_date' => 'required',
            'zzc' => 'required|regex:/^[0-9\.]+$/|',
            'zfz' => 'required|regex:/^[0-9\.]+$/|',
            'syzqy' => 'required|regex:/^[0-9\.]+$/|',
            'yysl' => 'required|regex:/^[0-9\.]+$/|',
            'yylr' => 'required|regex:/^[0-9\.]+$/|',
            'jlr' => 'required|regex:/^[0-9\.]+$/|',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => '报表类型不能为空。',
            'statement_date.required' => '报表日期不能为空。',
            'zzc.required' => '资产总额不能为空。',
            'zzc.regex' => '资产总额必须是数字。',
            'zfz.required' => '负债总额不能为空。',
            'zfz.regex' => '负债总额必须是数字。',
            'syzqy.required' => '净资产不能为空。',
            'syzqy.regex' => '净资产必须是数字。',
            'yysl.required' => '营业收入不能为空。',
            'yysl.regex' => '营业收入必须是数字。',
            'yylr.required' => '利润总额不能为空。',
            'yylr.regex' => '利润总额必须是数字。',
            'jlr.required' => '净利润不能为空。',
            'jlr.regex' => '净利润必须是数字。',
        ];
    }
}
