<form method="post" id="formBdxq">

<div class="box-body">
<div class="fields-group">

        <div class="row">
          {{csrf_field()}}
			<input type="hidden" name="project_id" id="project_id" class="project_id" value="{{$bdxq->project_id}}">
			<input type="hidden" name="assetInfo_id" id="assetInfo_id" value="{{$bdxq->id}}">
        </div>

<div class="row">
  <div class="container table-responsive col-md-12 align-items-center project-table">

<table cellpadding="0" cellspacing="1" class="table table-bordered">
 <tbody>
 	<tr>
   		<th colspan="4" align="center">标 的 具 体 信 息</th>
   	</tr>
   	<tr>
		<td style="width:150px;">土地证号</td>
		<td><input type="text" name="certificateNo" maxlength="30" class="easyui-validatebox textbox validatebox-text" value="{{$bdxq->certificateNo}}"></td>
		<td>地址</td>
		<td>
			<input type="text" name="address" size="40" maxlength="100" class="easyui-validatebox textbox validatebox-text" value="{{$bdxq->address}}">
	    </td>
	</tr>
   	<tr>
		<td style="width:150px;">土地面积</td>
		<td><input type="text" name="area" maxlength="10" class="easyui-validatebox textbox validatebox-text" value="{{$bdxq->area}}">&nbsp;平方米</td>
		<td style="width:150px;">土地类型</td>
		<td><input type="text" name="type" maxlength="30" class="easyui-validatebox textbox validatebox-text" value="{{$bdxq->type}}"></td>
	</tr>
   	<tr>
		<td style="width:150px;">使用年限<font color="red"></font></td>
		<td><input type="text" name="useYear" maxlength="6" value="{{$bdxq->useYear}}">&nbsp;年</td>
		<td style="width:150px;">已用年限<font color="red"></font></td>
		<td class="unput"><input type="text" name="usedYear" maxlength="6" value="{{$bdxq->usedYear}}">&nbsp;年</td>
	</tr>
   	<tr>
		<td style="width:150px;">规划用途</td>
		<td><input type="text" name="planningPurposes" maxlength="100" class="easyui-validatebox textbox validatebox-text" value="{{$bdxq->planningPurposes}}"></td>
		<td style="width:150px;">目前用途</td>
		<td><input type="text" name="currentlyUse" maxlength="100" class="easyui-validatebox textbox validatebox-text" value="{{$bdxq->currentlyUse}}"></td>
	</tr>
   	<tr>
		<td style="width:150px;">配套设施</td>
		<td colspan="3">
			<textarea rows="5" cols="81" name="supporting_facilities" maxlength="300">{{$bdxq->supporting_facilities}}</textarea>
		</td>
	</tr>
</tbody></table>
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