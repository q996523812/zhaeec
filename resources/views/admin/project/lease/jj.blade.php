<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">上传竞价结果</h3>

        <div class="box-tools">
            <div class="btn-group pull-right" style="margin-right: 5px">
    <a href="/admin/projectleases" class="btn btn-sm btn-default" title="列表"><i class="fa fa-list"></i><span class="hidden-xs">&nbsp;列表</span></a>
</div>
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="/admin/projectleases/jj/{{$project->id}}" method="post" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" pjax-container="">

        <div class="box-body">

                            <div class="fields-group">
<input type="hidden" name="project_id" value="{{$project->project_id}}" class="project_id"><div class="form-group  ">

    <label for="xmbh" class="col-sm-2  control-label">项目编号</label>

    <div class="col-sm-8">

        
        <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
            <input type="text" id="xmbh" name="xmbh" value="{{$project->xmbh}}" class="form-control xmbh" placeholder="输入 项目编号">
</div>

        
    </div>
</div>
                                                    <div class="form-group  ">

    <label for="title" class="col-sm-2  control-label">项目名称</label>

    <div class="col-sm-8">

        
        <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            
            <input type="text" id="title" name="title" value="{{$project->title}}" class="form-control title" placeholder="输入 项目名称">
</div>

        
    </div>
</div>
                                                    
                                                    <div class="form-group  ">

    <label for="filepath" class="col-sm-2  control-label">附件</label>

    <div class="col-sm-8">

        <input type="file" id="jjjg" name="jjjg">
        
</div>

                                            

                </div>
            
        </div>
        <!-- /.box-body -->

        <div class="box-footer">

    <input type="hidden" name="_token" value="zxpivjziPUjm9JDUAbPnJvvQXD0sLjvCUu0nZ636"><div class="col-md-2">
    </div>

    <div class="col-md-8">

                <div class="btn-group pull-right">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>

                
      
            </div>
</div>

                    <input type="hidden" name="_previous_" value="http://zhaeec.test/admin/jjresults" class="_previous_"><!-- /.box-footer -->
</form>
</div>
