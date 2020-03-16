<div class="row">
    <div class="col-md-12">
        <div class="box">
    
            <div class="box-header with-border">
                <div class="pull-right">
            
                    <div class="btn-group pull-right" style="margin-right: 10px">
                        <a class="btn btn-sm btn-twitter" title="导出"><i class="fa fa-download"></i><span class="hidden-xs"> 导出</span></a>
                        <button type="button" class="btn btn-sm btn-twitter dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/qycg?_pjax=%23pjax-container&amp;_export_=all" target="_blank">全部</a></li>
                            <li><a href="/admin/qycg?_pjax=%23pjax-container&amp;_export_=page%3A1" target="_blank">当前页</a></li>
                            <li><a href="/admin/qycg?_pjax=%23pjax-container&amp;_export_=selected%3A__rows__" target="_blank" class="export-selected">选择的行</a></li>
                        </ul>
                    </div>
            

                </div>
                <span>
                    <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="grid-select-all" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>&nbsp;

                    <div class="btn-group">
                        <a class="btn btn-sm btn-default">&nbsp;<span class="hidden-xs">操作</span></a>
                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" class="grid-batch-0">删除</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-sm btn-primary grid-refresh" title="刷新"><i class="fa fa-refresh"></i><span class="hidden-xs"> 刷新</span></a> 
                    <div class="btn-group" style="margin-right: 10px" data-toggle="buttons">
                        <label class="btn btn-sm btn-dropbox 5e6f2efa66da4-filter-btn " title="筛选">
                            <input type="checkbox"><i class="fa fa-filter"></i><span class="hidden-xs">&nbsp;&nbsp;筛选</span>
                        </label>

                    </div>
                </span>
            </div>
    
    <div class="box-header with-border hide" id="filter-box">
    <form action="http://zhaeec.test/admin/qycg?_pjax=%23pjax-container" class="form-horizontal" pjax-container="" method="get">

        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="fields-group">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> 项目名称</label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-addon">
                                    <i class="fa fa-pencil"></i>
                                    </div>
                                    <input type="text" class="form-control title" placeholder="项目名称" name="title" value="">
                                </div>    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> 项目编号</label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-addon">
                                        <i class="fa fa-pencil"></i>
                                    </div>

                                    <input type="text" class="form-control xmbh" placeholder="项目编号" name="xmbh" value="">
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="btn-group pull-left">
                            <button class="btn btn-info submit btn-sm"><i class="fa fa-search"></i>&nbsp;&nbsp;搜索</button>
                        </div>
                        <div class="btn-group pull-left " style="margin-left: 10px;">
                            <a href="http://zhaeec.test/admin/qycg?_pjax=%23pjax-container" class="btn btn-default btn-sm"><i class="fa fa-undo"></i>&nbsp;&nbsp;重置</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

    <!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>单位名称</th>
                <th>挂牌数量</th>
                <th>挂牌总金额（万元）</th>
                <th>成交数量</th>
                <th>成交总金额（万元）</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rpRows as $row)
            <tr>
                <td>
                    {{$row->ssjt}}
                </td>
                <td>
                    {{$row->gpsl}}
                </td>
                <td>
                    {{$row->gpje}}
                </td>
                <td>
                    {{$row->cjsl}}
                </td>
                <td>
                    {{$row->cjje}}
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    

    <div class="box-footer clearfix">
        <!--
        从 <b>1</b> 到 <b>1</b> ，总共 <b>1</b> 条
        <ul class="pagination pagination-sm no-margin pull-right">
            <li class="page-item disabled"><span class="page-link">«</span></li>
            <li class="page-item active"><span class="page-link">1</span></li>
            <li class="page-item disabled"><span class="page-link">»</span></li>
        </ul>
        <label class="control-label pull-right" style="margin-right: 10px; font-weight: 100;">
            <small>显示</small>&nbsp;
            <select class="input-sm grid-per-pager" name="per-page">
                <option value="http://zhaeec.test/admin/qycg?_pjax=%23pjax-container&amp;per_page=10">10</option>
                <option value="http://zhaeec.test/admin/qycg?_pjax=%23pjax-container&amp;per_page=20" selected="">20</option>
                <option value="http://zhaeec.test/admin/qycg?_pjax=%23pjax-container&amp;per_page=30">30</option>
                <option value="http://zhaeec.test/admin/qycg?_pjax=%23pjax-container&amp;per_page=50">50</option>
                <option value="http://zhaeec.test/admin/qycg?_pjax=%23pjax-container&amp;per_page=100">100</option>
            </select>
            &nbsp;<small>条</small>
        </label>
        -->
    </div>

    <!-- /.box-body -->
</div>
</div></div>