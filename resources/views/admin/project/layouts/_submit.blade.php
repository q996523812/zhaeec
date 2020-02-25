
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
            <a href="javascript:void(0)" id="btnSaveJgxx" class="btn btn-primary btn-pass" onclick="$('#formSubmit').submit();">提交审批</a>
          </center>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
  </div>
  <script>
    $(function () {

    });
  </script> 
</form>