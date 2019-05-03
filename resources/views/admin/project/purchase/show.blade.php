<div class="row"><div class="col-md-12">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">编辑</h3>
        <div class="box-tools">
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="javascript:void(0);" class="btn btn-sm btn-danger 5ca9d1d5b08d5-delete" title="删除">
                    <i class="fa fa-trash"></i><span class="hidden-xs">  删除</span>
                </a>
            </div>
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="http://shop.test/admin/projectpurchases/4" class="btn btn-sm btn-primary" title="查看">
                    <i class="fa fa-eye"></i><span class="hidden-xs"> 查看</span>
                </a>
            </div>
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="http://shop.test/admin/projectpurchases" class="btn btn-sm btn-default" title="列表"><i class="fa fa-list"></i><span class="hidden-xs">&nbsp;列表</span></a>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="http://shop.test/admin/projectpurchases/4" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
        <div class="box-body">
            <div class="fields-group">
                <div class="form-group  ">
                    <label for="code" class="col-sm-2  control-label">项目编号</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>        
                            <input type="text" id="code" name="code" value="zhaeec-19-03" class="form-control code" placeholder="输入 项目编号">
                        </div>
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="title" class="col-sm-2  control-label">项目名称</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                            
                            <input type="text" id="title" name="title" value="测试项目采购003" class="form-control title" placeholder="输入 项目名称">
                        </div>       
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="price" class="col-sm-2  control-label">挂牌价格</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>           
                            <input style="width: 130px; text-align: right;" type="text" id="price" name="price" value="2341200.000000" class="form-control price" placeholder="输入 挂牌价格">
                        </div>
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="date_start" class="col-sm-2  control-label">挂牌开始时间</label>
                    <div class="col-sm-8">        
                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>           
                            <input style="width: 160px" type="text" id="date_start" name="date_start" value="2019-04-07 00:00:00" class="form-control date_start" placeholder="输入 挂牌开始时间">
                        </div>       
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="date_end" class="col-sm-2  control-label">挂牌结束时间</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>           
                            <input style="width: 160px" type="text" id="date_end" name="date_end" value="2019-05-05 00:00:00" class="form-control date_end" placeholder="输入 挂牌结束时间">
                        </div>      
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="status" class="col-sm-2  control-label">项目状态</label>
                    <div class="col-sm-8">       
                        <input type="hidden" name="status">
                        <select class="form-control status select2-hidden-accessible" style="width: 100%;" name="status" data-value="1" tabindex="-1" aria-hidden="true">
                            <option value=""></option>
                            <option value="1" selected="">挂牌</option>
                            <option value="2">流标</option>
                            <option value="3">成交</option>
                        </select>
                        <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;">
                            <span class="selection">
                                <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-status-6y-container">
                                    <span class="select2-selection__rendered" id="select2-status-6y-container" title="挂牌">
                                        <span class="select2-selection__clear">×</span>
                                        挂牌
                                    </span>
                                    <span class="select2-selection__arrow" role="presentation">
                                        <b role="presentation"></b>
                                    </span>
                                </span>
                            </span>
                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group  ">
                    <label for="process" class="col-sm-2  control-label">流程节点</label>
                    <div class="col-sm-8">       
                        <input type="hidden" name="process">
                            <select class="form-control process select2-hidden-accessible" style="width: 100%;" name="process" data-value="3" tabindex="-1" aria-hidden="true">
                                <option value=""></option>
                                <option value="1">挂牌录入</option>
                                <option value="2">挂牌退回</option>
                                <option value="3" selected="">挂牌审核</option>
                            </select>
                            <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-process-pn-container"><span class="select2-selection__rendered" id="select2-process-pn-container" title="挂牌审核"><span class="select2-selection__clear">×</span>挂牌审核</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span>
                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                        </span>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="3" class="user_id">
                <div class="row">
                    <div class="col-sm-2 "><h4 class="pull-right">附件列表</h4></div>
                    <div class="col-sm-8"></div>
                </div>
                <hr style="margin-top: 0px;">
                <div id="has-many-files" class="has-many-files">
                    <div class="has-many-files-forms">
                        <div class="has-many-files-form fields-group">
                            <div class="form-group  ">
                                <label for="type" class="col-sm-2  control-label">附件类型</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="files[4][type]">
                                        <select class="form-control files type select2-hidden-accessible" style="width: 100%;" name="files[4][type]" data-value="1" tabindex="-1" aria-hidden="true">
                                            <option value=""></option>
                                            <option value="1" selected="">委托方附件</option>
                                            <option value="2">意向方附件</option>
                                        </select>
                                        <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-files4type-9t-container"><span class="select2-selection__rendered" id="select2-files4type-9t-container" title="委托方附件"><span class="select2-selection__clear">×</span>委托方附件</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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
                                    <div class="clearfix"></div>
                                    <div class="input-group file-caption-main">
                                        <div class="file-caption form-control  kv-fileinput-caption icon-visible" tabindex="500">
                                            <span class="file-caption-icon"><i class="glyphicon glyphicon-file"></i></span>
                                            <input class="file-caption-name" onkeydown="return false;" onpaste="return false;" placeholder="Select file..." title="看过的书.txt">
                                        </div>
                                        <div class="input-group-btn input-group-append">     
                                            <button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default btn-secondary kv-hidden fileinput-cancel fileinput-cancel-button">
                                                <i class="glyphicon glyphicon-ban-circle"></i>  
                                                <span class="hidden-xs">Cancel</span>
                                            </button>
                                  
                                            <div tabindex="500" class="btn btn-primary btn-file">
                                                <i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">浏览</span><input type="file" class="files path" name="files[4][path]" data-initial-preview="" data-initial-caption="看过的书.txt" id="1554633175362_68">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="files[4][id]" value="4" class="files id">
                        <input type="hidden" name="files[4][_remove_]" value="0" class="files _remove_ fom-removed">
                        <div class="form-group">
                    <label class="col-sm-2  control-label"></label>
                    <div class="col-sm-8">
                        <div class="remove btn btn-warning btn-sm pull-right">
<i class="fa fa-trash">&nbsp;</i>移除</div>
                    </div>
                </div>
                                <hr>
</div>
            </div>
    <template class="files-tpl"><div class="has-many-files-form fields-group">
            <div class="form-group  ">
<label for="type" class="col-sm-2  control-label">附件类型</label>
    <div class="col-sm-8">       
        <input type="hidden" name="files[new___LA_KEY__][type]"><select class="form-control files type" style="width: 100%;" name="files[new___LA_KEY__][type]" data-value="1"><option value=""></option>
<option value="1" selected="">委托方附件</option>
<option value="2">意向方附件</option></select>
</div>
</div>
<div class="form-group  ">
    <label for="path" class="col-sm-2  control-label">附件</label>
    <div class="col-sm-8">        
        <input type="file" class="files path" name="files[new___LA_KEY__][path]">
</div>
</div>
<input type="hidden" name="files[new___LA_KEY__][id]" value="" class="files id"><input type="hidden" name="files[new___LA_KEY__][_remove_]" value="0" class="files _remove_ fom-removed"><div class="form-group">
                <label class="col-sm-2  control-label"></label>
                <div class="col-sm-8">
                    <div class="remove btn btn-warning btn-sm pull-right">
<i class="fa fa-trash"></i>&nbsp;移除</div>
                </div>
            </div>
            <hr>
</div>
    </template><div class="form-group">
        <label class="col-sm-2  control-label"></label>
        <div class="col-sm-8">
            <div class="add btn btn-success btn-sm">
<i class="fa fa-save"></i>&nbsp;新增</div>
        </div>
    </div>   
</div>
                </div>            
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
    <input type="hidden" name="_token" value="lZPajkOLviH6e0ulqw1U8K7pvB6m5RjBLPvzPsij"><div class="col-md-2">
    </div>
    <div class="col-md-8">
                <div class="btn-group pull-right">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
                <label class="pull-right" style="margin: 5px 10px 0 0;">
            <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="after-submit" name="after-save" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 继续编辑
        </label>        
                    <label class="pull-right" style="margin: 5px 10px 0 0;">
                <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="after-submit" name="after-save" value="2" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 继续创建
            </label>        
                <label class="pull-right" style="margin: 5px 10px 0 0;">
            <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="after-submit" name="after-save" value="3" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> 查看
        </label>        
                <div class="btn-group pull-left">
            <button type="reset" class="btn btn-warning">重置</button>
        </div>
            </div>
</div>
                    <input type="hidden" name="_method" value="PUT" class="_method"><input type="hidden" name="_previous_" value="http://shop.test/admin/projectpurchases" class="_previous_"><!-- /.box-footer -->
</form>
</div>

</div>
</div>