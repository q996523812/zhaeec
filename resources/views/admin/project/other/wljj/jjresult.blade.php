<div class="box box-info">
  <div class="box-header with-border">

    <div class="box-tools">
      <div class="btn-group float-right" style="margin-right: 10px">
        <a href="/admin/projects" class="btn btn-sm btn-default"><i class="fa fa-list"></i> 列表</a>
      </div>
    </div>
  </div>
  <div class="box-body">

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <form action="/admin/projectpurchases/{{$project->project_id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
          <div class="col-md-12">
            <div class=" ">
              <label for="xmbh" class=" control-label">项目编号</label>
              <div class="">      
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                              
                  <input type="text" id="xmbh" name="xmbh" value="{{$project->xmbh}}" class="form-control xmbh" placeholder="输入 项目编号">
                </div>       
              </div>
            </div>
          </div>
          <div class="col-md-12">
          <div class=" ">
          <label for="title" class=" control-label">标的名称</label>
          <div class="">      
          <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>          
          <input type="text" id="title" name="title" value="{{$project->title}}" class="form-control title" placeholder="输入 标的名称">
          </div> 
          </div>
          </div>
          </div>

<div class="form-group  ">
  <label for="path" class="col-sm-2  control-label">附件</label>
  <div class="col-sm-8">
    <div class="file-input file-input-new">
      <div class="file-preview ">
        <button type="button" class="close fileinput-remove" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>    
        <div class="file-drop-disabled">
          <div class="file-preview-thumbnails">
          </div>
          <div class="clearfix"></div>    
          <div class="file-preview-status text-center text-success"></div>
          <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
        </div>
      </div>
      <div class="kv-upload-progress kv-hidden" style="display: none;">
        <div class="progress">
          <div class="progress-bar bg-success progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
              0%
          </div>
        </div>
      </div>
      <div class="clearfix">
        
      </div>
      <div class="input-group file-caption-main">
        <div class="file-caption form-control  kv-fileinput-caption" tabindex="500">
          <span class="file-caption-icon"></span>
          <input class="file-caption-name" onkeydown="return false;" onpaste="return false;" placeholder="Select file...">
        </div>
        <div class="input-group-btn input-group-append">      
          <button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default btn-secondary kv-hidden fileinput-cancel fileinput-cancel-button"><i class="glyphicon glyphicon-ban-circle"></i>  <span class="hidden-xs">Cancel</span></button>    
          <div tabindex="500" class="btn btn-primary btn-file">
            <i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">浏览</span>
            <input type="file" class="files path" name="files[new_1][path]" id="1555822915420_12">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

                  
          <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                      
          <input type="text" id="title" name="title" value="{{$project->title}}" class="form-control title" placeholder="输入 标的名称">
          </div>

          <div class="col-md-12">
          <input type="hidden" name="status" value="1" class="status">
          </div>
          <div class="col-md-12">
          <input type="hidden" name="process" value="1" class="process">
          </div>
          <div class="col-md-12">
          <input type="hidden" name="user_id" value="1" class="user_id">
          </div>
          <div class="col-md-12">
          <input type="hidden" name="project_id" value="7b695110-4381-48fb-8265-66f6a051360a" class="project_id">
          </div>
          <div class="col-md-12">
          <input type="hidden" name="id" value="fdba11d3-8daa-4e7e-bd9d-69a66cf9cbe7" class="id">
          </div>
          <div class="col-md-12">
          <input type="hidden" name="sjly" value="业务录入" class="sjly">
          </div>
          </div>
                                                      
          </div>
                      
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
          <input type="hidden" name="_token" value="WxIozf9zbV5hxfPDgouiISvPZSwu3Rm2Ig9YQBPi"><div class="col-md-2">
          </div>

          </div>
          <input type="hidden" name="_method" value="PUT" class="_method">
          <input type="hidden" name="_previous_" value="http://zhaeec.test/admin/projectleases" class="_previous_"><!-- /.box-footer -->
          </form>         
        </div>
        <div class="col-md-8">
            {{csrf_field()}}
            <input type="hidden" id="operation" name="operation" value="通过">
            <input type="hidden" id="process" name="process" value="aaa">
            <input type="hidden" id="work_process_node_name" name="work_process_node_name" value="哈哈哈">
            
            <div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
              
                    <input type="text" id="reason" name="reason" value="" class="form-control title" placeholder="输入退回理由">
                </div>
            </div>
            <div class="btn-group pull-right">
                <button type="submit" class="btn btn-primary btn-pass">通过</button>
                <button type="submit" class="btn btn-primary btn-back">退回</button>
            </div>
        </div>


    </div>

  </div>


</div>