          <form action="/admin/projects/approval" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="approvalForm">
            <input type="hidden" id="operation" name="operation" value="" class="operation" >
            <input type="hidden" id="isNext" name="isNext" value="" class="isNext" >
            <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id" >
            <input type="hidden" id="project_id" name="project_id" value="{{$detail->project_id}}" class="project_id" >
            <div class="box-body">
              <div class="fields-group">
                <div class="row">
                  <div class="col-md-8">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>                    
                          <input type="text" id="reason" name="reason" value="" class="form-control title" placeholder="输入退回理由">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="btn-group pull-right">
                      <button type="submit" class="btn btn-primary btn-pass">通过</button>
                      <button type="submit" class="btn btn-primary btn-back">退回</button>
                    </div>
                  </div>
                </div>                                               
              </div>
            </div>
    <script>
      $(document).ready(function(){
        $('.btn-pass').on('click', function () {
            $("#operation").val("审批通过");
            $("#isNext").val(2);
            $("#approvalForm").submit();
            return false;
        });
        $('.btn-back').on('click', function () {
            $("#operation").val("审批退回");
            $("#isNext").val(1);
            $("#approvalForm").submit();
            return false;
        });

      });
    </script>
          </form>