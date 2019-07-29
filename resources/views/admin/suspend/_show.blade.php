  <form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">
    <div class="box-body">
      <div class="fields-group">
        <div class="row">
          {{csrf_field()}}
          <input type="hidden" name="status" value="1" class="status form-control">
          <input type="hidden" name="process" value="" class="process form-control">
          <input type="hidden" name="user_id" value="1" class="user_id form-control">
          <input type="hidden" name="project_id" value="{{$project->id}}" class="project_id form-control">
          <input type="hidden" id="id" name="id" value="{{$suspend->id}}" class="id form-control">
          <input type="hidden" name="sjly" value="业务录入" class="sjly form-control">
          <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
        </div>      
        <div class="row">
          <div class="container table-responsive col-md-12 align-items-center project-table">
            <table class="table table-bordered">
              <thead>
                <th colspan="4">公告</th>
              </thead>  
              <tbody>
                <tr>
                  <td class=" control-label">公告类型</td>
                  <td colspan="3">
                    <select id="type" name="type" class="form-control type" readonly="true"></select>
                  </td>
                </tr>
                <tr>
                  <td class=" control-label">项目编号</td>
                  <td colspan="3">
                    <input type="text" id="xmbh" name="xmbh" value="{{$project->xmbh}}" class="form-control xmbh" placeholder="输入 项目编号" readonly="true">
                  </td>
                </tr>
                <tr>
                  <td class=" control-label">项目名称</td>
                  <td colspan="3">
                    <input type="text" id="title" name="title" value="{{$project->title}}" class="form-control title" placeholder="输入 项目名称" readonly="true">
                  </td>
                </tr>
                <tr>
                  <td class=" control-label">中止日期</td>
                  <td colspan="3">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                      <input type="text" id="date_matter" name="date_matter" value="{{$suspend->date_matter}}" class="form-control date_matter" placeholder="输入 中止日期" readonly="true">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class=" control-label">理由</td>
                  <td colspan="3">
                    <textarea id="content" name="content" class="form-control content" rows="5" placeholder="输入 其它需要披露的事项" readonly="true">{{$suspend->content}}</textarea>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>  
    <script>
    $(function () {
        //日期
        $('.date_matter').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //下拉框
        $('.type').selecter({
          autoSelect: false,
          type: "suspendtype",
          selectvalue: "{{$suspend->type}}"
        });

    });
    </script>       
  </form>  