<div class="box box-info">
  <div class="box-header with-border">
    <ul id="myTab" class="nav nav-tabs ">
      <li class="active">
          <a href="#tab1" data-toggle="tab">
              基本信息
          </a>
      </li>
      <li><a href="#tab2" data-toggle="tab">意向方</a></li>
      <li><a href="#tab3" data-toggle="tab">附件</a></li>
      <li><a href="#tab4" data-toggle="tab">操作记录</a></li>      
    </ul>

    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="#" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>
    </div>
  </div>
  <div class="box-body">

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="tab1">

          <div class="fields-group  ">

            <div class="form-group  ">
              <label for="code" class="col-sm-2  control-label ">项目编号</label>
              <div class="col-sm-8">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>                      
                      <input type="text" id="code" name="code" value="{{$project->title}}" class="form-control code" placeholder="输入 项目编号">
                  </div> 
              </div>
            </div>
          </div>
            
        </div>
        <div class="tab-pane fade" id="tab2">
          <div class="col-sm-10">
            <table class="table table-bordered ">
              <tbody>
                <tr>
                  <td>委托方名称</td>
                  <td>保证金</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="tab3">
            <table class="table table-bordered">
              <tbody>
                @foreach($project->files as $file)
                <tr>
                  <td> 
                    @if($file->type == 1)
                      委托方
                    @else
                      意向方
                    @endif

                  </td>
                  <td><a href="{{$file->path}}">{{$file->path}}</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>
        <div class="tab-pane fade" id="tab4">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>序号</td>
                  <td>操作人</td>
                  <td>操作时间</td>
                  <td>操作节点</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>qss</td>
                  <td>2019-04-02</td>
                  <td>提交</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>

  </div>
  <div class="box-footer">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="btn-group pull-right">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
      </div>
      
  </div>

</div>