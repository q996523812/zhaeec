(function ($) {
	var checkbox_datas = {
		//信息发布方式
		fbfs : {
			1 : '珠海产权交易中心网站',
			2 : '珠海产权交易中心微信',
			3 : '民营经济报',
			4 : '珠海特区报',
			5 : '阳江日报',
			6 : '其他'
		},
		announceWay :{
			1:'省级以上经济金融或综合报刊',
			2:'产权交易机构网站',
			3:'金融企业网站',
			4:'其他方式公告'
		},
		pubPayMode:{
			1:'一次性支付',
			2:'分期支付',
		},
		innerAudit :{
			1:'董事会决议',
			2:'股东会决议',
			3:'总经理办公会决议',
			4:'其他类型'
		},
	}
	if (typeof window !== 'undefined') {
	    window.checkbox_datas = checkbox_datas;
	}
})(jQuery);