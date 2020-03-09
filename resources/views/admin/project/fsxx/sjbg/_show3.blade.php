<form method="post" id="formSjbg1">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
      <input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$sj1->project_id}}">
      <input type="hidden" name="auditReport_id" id="auditReport_id" value="{{$sj1->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">

<table id="last2Year" cellpadding="0" cellspacing="1" class="table table-bordered">
	<tbody><tr>
		<th colspan="4">以下数据出自年度审计报告</th>
	</tr>
	<tr>
    	<td rowspan="4">
        前一年度<font color="red">*</font>
        <input name="year" type="text" size="4" required="true" class="number" value="{{$sj1->year}}">年
    	<br>
      <input id="ywwftg1" name="ywwftg" type="checkbox" value="1"
            @if($sj1->ywwftg == '1')
      checked
      @endif
      >业务无法提供
    	</td>
    	<td>资产总额<font color="red">*</font>
			   <input name="zzc" type="text" size="12" class="money" value="{{$sj1->zzc}}">万元
      	</td>
      	<td>负债总额<font color="red">*</font>
        	<input name="zfz" type="text" size="12" class="money" value="{{$sj1->zfz}}">万元
      	</td>
      	<td>净资产（所有者权益）<font color="red">*</font>
      		<input name="syzqy" type="text" size="12" class="money" value="{{$sj1->syzqy}}">万元
      	</td>
    	</tr>
    <tr>
    	<td>营业收入<font color="red">*</font>
    		<input name="yysl" type="text" size="12" class="money" value="{{$sj1->yysl}}">万元
    	</td>
    	<td>利润总额<font color="red">*</font>
    		<input name="yylr" type="text" size="12" class="money" value="{{$sj1->yylr}}">万元
      	</td>
    	<td>净利润<font color="red">*</font>
			<input name="jlr" type="text" size="12" class="money" value="{{$sj1->jlr}}">万元
        </td>
    </tr>
    <tr>
      	<td colspan="3">审计机构名称  <font color="red">*</font>
      		<input name="sjjgmc" type="text" size="80" required="true" value="{{$sj1->sjjgmc}}">
      	</td>
    </tr>
    <tr>
      	<td colspan="3" class="unput">备注<br>
          <textarea name="desc" cols="60" rows="3" validtype="length[0,1000]">{{$sj1->desc}}</textarea>
        </td>
    </tr>
    
</tbody>
</table>
</div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="btn-group pull-right">
      
    </div>
  </div>
</div> 
                                            
</div>
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

</form>

<form method="post" id="formSjbg2">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
      <input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$sj2->project_id}}">
      <input type="hidden" name="auditReport_id" id="auditReport_id" value="{{$sj2->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">


<table id="last2Year" cellpadding="0" cellspacing="1" class="table table-bordered">
  <tbody><tr>
    <th colspan="4">以下数据出自年度审计报告</th>
  </tr>
  <tr>
      <td rowspan="4">
        前一年度<font color="red">*</font>
        <input name="year" type="text" size="4" required="true" class="number" value="{{$sj2->year}}">年
      <br>
      <input id="ywwftg2" name="ywwftg" type="checkbox" value="1"
      @if($sj2->ywwftg == '1')
      checked
      @endif
      >业务无法提供
      </td>
      <td>资产总额<font color="red">*</font>
         <input name="zzc" type="text" size="12" class="money" value="{{$sj2->zzc}}">万元
        </td>
        <td>负债总额<font color="red">*</font>
          <input name="zfz" type="text" size="12" class="money" value="{{$sj2->zfz}}">万元
        </td>
        <td>净资产（所有者权益）<font color="red">*</font>
          <input name="syzqy" type="text" size="12" class="money" value="{{$sj2->syzqy}}">万元
        </td>
      </tr>
    <tr>
      <td>营业收入<font color="red">*</font>
        <input name="yysl" type="text" size="12" class="money" value="{{$sj2->yysl}}">万元
      </td>
      <td>利润总额<font color="red">*</font>
        <input name="yylr" type="text" size="12" class="money" value="{{$sj2->yylr}}">万元
        </td>
      <td>净利润<font color="red">*</font>
      <input name="jlr" type="text" size="12" class="money" value="{{$sj2->jlr}}">万元
        </td>
    </tr>
    <tr>
        <td colspan="3">审计机构名称  <font color="red">*</font>
          <input name="sjjgmc" type="text" size="80" required="true" value="{{$sj2->sjjgmc}}">
        </td>
    </tr>
    <tr>
        <td colspan="3" class="unput">备注<br>
          <textarea name="desc" cols="60" rows="3" validtype="length[0,1000]">{{$sj2->desc}}</textarea>
        </td>
    </tr>
    
</tbody>
</table>
</div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="btn-group pull-right">
      
    </div>
  </div>
</div> 
                                            
</div>
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

</form>

<form method="post" id="formSjbg3">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
      <input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$sj3->project_id}}">
      <input type="hidden" name="auditReport_id" id="auditReport_id" value="{{$sj3->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">

<table id="last2Year" cellpadding="0" cellspacing="1" class="table table-bordered">
  <tbody><tr>
    <th colspan="4">以下数据出自年度审计报告</th>
  </tr>
  <tr>
      <td rowspan="4">
        前一年度<font color="red">*</font>
        <input name="year" type="text" size="4" required="true" class="number" value="{{$sj3->year}}">年
      <br>
      <input id="ywwftg3" name="ywwftg" type="checkbox" value="1"
      @if($sj3->ywwftg == '1')
      checked
      @endif
      >业务无法提供
      </td>
      <td>资产总额<font color="red">*</font>
         <input name="zzc" type="text" size="12" class="money" value="{{$sj3->zzc}}">万元
        </td>
        <td>负债总额<font color="red">*</font>
          <input name="zfz" type="text" size="12" class="money" value="{{$sj3->zfz}}">万元
        </td>
        <td>净资产（所有者权益）<font color="red">*</font>
          <input name="syzqy" type="text" size="12" class="money" value="{{$sj3->syzqy}}">万元
        </td>
      </tr>
    <tr>
      <td>营业收入<font color="red">*</font>
        <input name="yysl" type="text" size="12" class="money" value="{{$sj3->yysl}}">万元
      </td>
      <td>利润总额<font color="red">*</font>
        <input name="yylr" type="text" size="12" class="money" value="{{$sj3->yylr}}">万元
        </td>
      <td>净利润<font color="red">*</font>
      <input name="jlr" type="text" size="12" class="money" value="{{$sj3->jlr}}">万元
        </td>
    </tr>
    <tr>
        <td colspan="3">审计机构名称  <font color="red">*</font>
          <input name="sjjgmc" type="text" size="80" required="true" value="{{$sj3->sjjgmc}}">
        </td>
    </tr>
    <tr>
        <td colspan="3" class="unput">备注<br>
          <textarea name="desc" cols="60" rows="3" validtype="length[0,1000]">{{$sj3->desc}}</textarea>
        </td>
    </tr>

</tbody>
</table>
</div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="btn-group pull-right">
      
    </div>
  </div>
</div> 
                                            
</div>
            
</div>
<!-- /.box-body -->
<div class="box-footer">
</div>

</form>
