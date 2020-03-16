
<div class="print">
	<div class="one">
		<div class="title">收费通知</div>
		<div class="call">{{$sftz->zbf}}：</div>
		<div class="content">
			<p>
			{{$sftz->title}}已经圆满结束，贵方以人民币{{$sftz->zbjg_dx}}（小写：¥{{$sftz->zbjg_xx}}元）的价格中标。按照《珠海产权交易中心采购业务委托协议》的约定，本项目服务费由中标方承担，贵方需支付本中心交易服务费人民币{{$sftz->zbf_fwf_dx}}（￥{{$sftz->zbf_fwf_xx}}元）。请将上述服务费在 {{$sftz->hk_date}}前汇至如下帐户：
			</p>
			<p>开户名：{{$sftz->account_name}}</p>
			<p>开户行：{{$sftz->account_bank}}</p>
			<p>帐  号：{{$sftz->account_no}}</p>
			<p>注:在银行的汇款进帐单的“备注”或“付款理由”栏上注明：“XXX项目交易服务费”字样。</p>
			
			<p>如需开具增值税发票，请贵司发送所需开票类型（普通发票或专用发票）及相应的开票资料至邮箱：{{$sftz->email}}</p>
			<p>特此通知。</p>
		</div>
		<div class="inscription">
			<div>珠海产权交易中心有限责任公司</div>
			<div>{{$sftz->qf_date}}</div>
		</div>
	</div>
	<div class="two">
		<div>交易服务费计算方法如下：</div>
		<div></div>
		<div></div>
	</div>
</div>