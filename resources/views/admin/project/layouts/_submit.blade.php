
<form action="/admin/{{$projecttype}}/submit" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formSubmit">
  <div class="box-body">
    <div class="fields-group">
      <div class="row">
          {{csrf_field()}}
          <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id">
          <input type="hidden" id="process" name="process" value="13">
          <input type="hidden" id="work_process_node_name" name="work_process_node_name" value="">
      </div>
      <div class="row">
        <div class="container table-responsive col-md-12 align-items-center project-table">

          <table cellpadding="0" cellspacing="1" class="table table-bordered">
          	<tbody>
              <tr>
          	    <th style="width:260px;">复核人<font color="red">*</font></th>
          	    <td colspan="3">
                  <select id="fhr" name="fhr">
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
                </td>
            	</tr>

          	</tbody>
          </table>
          <center>
            <a href="javascript:void(0)" id="btnSubmit" class="btn btn-primary btn-pass" >提交审批</a>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
  </div>
  <script>
$(document).ready(function(){
      $('#btnSubmit').on('click',function(){
        if(!check()){ return false;}
        $('#formSubmit').submit();
      });
            //检查必要的标签页是否保存
      function check(){
        var flag = true;
        var massage = "请先保存";
        var projecttype = $('#projecttype').val();
        if($('#formdetail id').val()){
          massage += "基本信息、";
          flag = false;
        }
        if(projecttype == 'qycg' || projecttype == 'cqzr' || projecttype == 'zzkg'){
          if(!$('#targetCompanyBaseInfo_id').val()){
            switch(projecttype){
              case 'qycg':
                massage += "采购企业情况、";
                break;
              case 'cqzr':
                massage += "标的企业情况、";
                break;
              case 'zzkg':
                massage += "融资企业情况";
                break;
            }
            flag = false;
          }
        }
        if(projecttype == 'zczl' || projecttype == 'cqzr' || projecttype == 'zczr'){
          if(!$('#sellerInfo_id').val()){
            massage += "转让方、";
            switch(projecttype){
              case 'zczl':
                massage += "出租方、";
                break;
              case 'cqzr':
                massage += "转让方、";
                break;
              case 'zczr':
                massage += "转让方、";
                break;
            }
            flag = false;
          }
        }
        if(!flag){
          massage = massage.substr(0, massage.length-1);
          alert(massage);
        }
        
        return flag;
      }
      
    });
  </script> 
</form>