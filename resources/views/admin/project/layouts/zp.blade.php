<div class="warning-message">

</div>
<div class="box box-info">
  <div class="box-header with-border">

    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="@yield('listurl')" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>
    </div>
  </div>
  <div class="box-body">
      <div class="col-md-8">
        <form action="/admin/{{$projecttype}}/zp/{{$detial->id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
          {{csrf_field()}}
          <input type="hidden" id="operation" name="operation" value="通过">
          <input type="hidden" id="process" name="process" value="">
          <input type="hidden" id="work_process_node_name" name="work_process_node_name" value="">
          
          <div>
              <div class="input-group">
                  
                  
              </div>
          </div>
          <div class="btn-group pull-right">
              <button type="submit" class="btn btn-primary btn-pass" style="margin-right:20px;">确认摘牌</button>
              <button type="submit" class="btn btn-primary btn-back">流标</button>
          </div>
        </form>
      </div>
      <script>
        $(document).ready(function(){
          $('.btn-pass').on('click', function () {
              $("#operation").val("摘牌");
              $("#process").val(@yield('nextprocess'));
              $(".form-horizontal").submit();
              return false;
          });
          $('.btn-back').on('click', function () {
              $("#operation").val("流标");
              $("#process").val("21");
              $(".form-horizontal").submit();
              return false;
          });

        });
      </script>
  </div>
  <div class="box-footer">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        
      </div>

  </div>

</div>