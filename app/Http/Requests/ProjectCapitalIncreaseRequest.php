<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCapitalIncreaseRequest extends FormRequest
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
            'pauseText' => 'required',
            'isGzw' => 'required',
            'gpjg' => 'required',
            'sellPercent1' => 'required',
            'spare91' => 'required',
            'pub_moneyFor' => 'required|max:600',
            'pub_holderIn' => 'required',
            'pub_buyerPaperFlag' => 'required',
            'pubDays' => 'required',
            'unitTransferee' => 'required',
            'pub0' => 'required',
            'pubBail' => 'required',
            'pubBailMemo' => 'required',
            'buyConditions' => 'required',
            'pubPayMode' => 'required',
            'important' => 'required',
            'pubDealWay' => 'required',
            'addMoneyPlan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '项目名称不能为空。',
            'pauseText.required' => '项目名称不能为空。',
            'isGzw.required' => '是否国有不能为空。',
            'gpjg.required' => '拟公开募集资金总额不能为空。',
            'sellPercent1.required' => '拟公开募集资金对应持股比例不能为空。',
            'spare91.required' => '拟公开征集投资方数量不能为空。',
            'pub_moneyFor.required' => '募集资金用途不能为空。',
            'pub_moneyFor.max' => '募集资金用途不能超过600个字。',
            'pub_holderIn.required' => '原股东是否有投资意向不能为空。',
            'pub_buyerPaperFlag.required' => '企业管理层或员工是否有投资意向不能为空。',
            'pubDays.required' => '挂牌公告期不能为空。',
            'unitTransferee.required' => '是否允许联合受让不能为空。',
            'pub0.required' => '是否允许网上报名不能为空。',
            'pubBail.required' => '保证金不能为空。',
            'pubBailMemo.required' => '保证金处置方式不能为空。',
            'buyConditions.required' => '受让方资格条件不能为空。',
            'pubPayMode.required' => '价款支付方式不能为空。',
            'important.required' => '重大事项及其他披露内容不能为空。',
            'pubDealWay.required' => '遴选方式不能为空。',
            'addMoneyPlan.required' => '增资方案主要内容不能为空。',
        ];
    }
}
