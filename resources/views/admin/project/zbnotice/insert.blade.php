
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">创建</h3>
        <div class="box-tools">
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="/admin/projectpurchases" class="btn btn-sm btn-default" title="列表">
                    <i class="fa fa-list"></i><span class="hidden-xs">&nbsp;列表</span>
                </a>
            </div>
        </div>
    </div>
<!-- /.box-header -->
<!-- form start -->

<form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}">
<div class="box-body">
<div class="fields-group">

<div class="form-group  ">
<label for="type" class="col-sm-2  control-label">项目类型</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="type" name="type" value="{{$project->type}}" class="form-control type" placeholder="输入 项目类型">
</div>
</div>
</div>
<div class="form-group  ">
<label for="tzsbh" class="col-sm-2  control-label">通知书编号</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="tzsbh" name="tzsbh" value="" class="form-control tzsbh" placeholder="输入 通知书编号">
</div>
</div>
</div>
<div class="form-group  ">
<label for="xmbh" class="col-sm-2  control-label">项目编号</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="xmbh" name="xmbh" value="{{$project->xmbh}}" class="form-control xmbh" placeholder="输入 项目编号">
</div>
</div>
</div>
<div class="form-group  ">
<label for="title" class="col-sm-2  control-label">标的名称</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="title" name="title" value="{{$project->title}}" class="form-control title" placeholder="输入 标的名称">
</div>
</div>
</div>
<div class="form-group  ">
<label for="zbnr" class="col-sm-2  control-label">中标内容</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="zbnr" name="zbnr" value="" class="form-control zbnr" placeholder="输入 中标内容">
</div>
</div>
</div>
<div class="form-group  ">
<label for="zbr" class="col-sm-2  control-label">中标方名称</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="zbr" name="zbr" value="" class="form-control zbr" placeholder="输入 中标方名称">
</div>
</div>
</div>
<div class="form-group  ">
<label for="zbf_phone" class="col-sm-2  control-label">中标方手机号码</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="zbf_phone" name="zbf_phone" value="" class="form-control zbf_phone" placeholder="输入 中标方手机号码">
</div>
</div>
</div>
<div class="form-group  ">
<label for="zbf_lx_1" class="col-sm-2  control-label">中标方类型1</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="zbf_lx_1" name="zbf_lx_1" value="" class="form-control zbf_lx_1" placeholder="输入 中标方类型1">
</div>
</div>
</div>
<div class="form-group  ">
<label for="zbf_lx_2" class="col-sm-2  control-label">中标方类型2</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="zbf_lx_2" name="zbf_lx_2" value="" class="form-control zbf_lx_2" placeholder="输入 中标方类型2">
</div>
</div>
</div>
<div class="form-group  ">
<label for="jysj" class="col-sm-2  control-label">交易时间</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
<input style="width: 160px" type="text" id="jysj" name="jysj" value="2019-04-16 18:09:33" class="form-control jysj" placeholder="输入 Jysj">
</div>
</div>
</div>
<div class="form-group  ">
<label for="cjj_zj" class="col-sm-2  control-label">成交总价(万元)</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
<input style="width: 130px; text-align: right;" type="text" id="cjj_zj" name="cjj_zj" value="" class="form-control cjj_zj" placeholder="输入 成交总价(万元)">
</div>
</div>
</div>
<div class="form-group  ">
<label for="cjj_dj" class="col-sm-2  control-label">成交单价（万元）</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
<input style="width: 130px; text-align: right;" type="text" id="cjj_dj" name="cjj_dj" value="" class="form-control cjj_dj" placeholder="输入 成交单价（万元）">
</div>
</div>
</div>
<div class="form-group  ">
<label for="cjj_bz" class="col-sm-2  control-label">成交价格备注</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="cjj_bz" name="cjj_bz" value="" class="form-control cjj_bz" placeholder="输入 成交价格备注">
</div>
</div>
</div>
<div class="form-group  ">
<label for="jyfs" class="col-sm-2  control-label">交易方式</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="jyfs" name="jyfs" value="" class="form-control jyfs" placeholder="输入 交易方式">
</div>
</div>
</div>
<div class="form-group  ">
<label for="jycd" class="col-sm-2  control-label">交易场地</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="jycd" name="jycd" value="" class="form-control jycd" placeholder="输入 交易场地">
</div>
</div>
</div>
<div class="form-group  ">
<label for="zbf_qy" class="col-sm-2  control-label">中标方所属区域</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
<input type="text" id="zbf_qy" name="zbf_qy" value="" class="form-control zbf_qy" placeholder="输入 中标方所属区域">
</div>
</div>
</div>
<div class="form-group  ">
    <!--在XX个工作日内签订合同-->
    <label for="zbhyq" class="col-sm-2  control-label">中标后要求</label>
    <div class="col-sm-8">
        <div class="input-group">
            <div class="input-group">
                <span class="input-group-btn"><button type="button" class="btn btn-primary">-</button></span>
                <input style="width: 100px; text-align: center;" type="text" id="zbhyq" name="zbhyq" value="0" class="form-control zbhyq initialized" placeholder="输入 Zbhyq">
                <span class="input-group-btn"><button type="button" class="btn btn-success">+</button></span>
            </div>
        </div>
    </div>
</div>
<div class="form-group  ">
<label for="tzs_fs" class="col-sm-2  control-label">通知书总份数</label>
<div class="col-sm-8">
<div class="input-group">
<div class="input-group">
    <span class="input-group-btn"><button type="button" class="btn btn-primary">-</button></span>
    <input style="width: 100px; text-align: center;" type="text" id="tzs_fs" name="tzs_fs" value="0" class="form-control tzs_fs initialized" placeholder="输入 Tzs fs">
    <span class="input-group-btn"><button type="button" class="btn btn-success">+</button></span>
</div>
</div>
</div>
</div>
<div class="form-group  ">
<label for="tzs_fs_1" class="col-sm-2  control-label">转让方/委托方份数</label>
<div class="col-sm-8">
<div class="input-group">
<div class="input-group">

    <span class="input-group-btn"><button type="button" class="btn btn-primary">-</button></span>
    <input style="width: 100px; text-align: center;" type="text" id="tzs_fs_1" name="tzs_fs_1" value="0" class="form-control tzs_fs_1 initialized" placeholder="输入 Tzs fs 1">
    <span class="input-group-btn"><button type="button" class="btn btn-success">+</button></span>
</div>
</div>
</div>
</div>
<div class="form-group  ">
<label for="tzs_fs_2" class="col-sm-2  control-label">受让方/中标方份数</label>
<div class="col-sm-8">
<div class="input-group">
<div class="input-group"><span class="input-group-btn"><button type="button" class="btn btn-primary">-</button></span><input style="width: 100px; text-align: center;" type="text" id="tzs_fs_2" name="tzs_fs_2" value="0" class="form-control tzs_fs_2 initialized" placeholder="输入 Tzs fs 2"><span class="input-group-btn"><button type="button" class="btn btn-success">+</button></span></div>
</div>
</div>
</div>
<div class="form-group  ">
<label for="tzs_fs_3" class="col-sm-2  control-label">珠海产权交易中心份数</label>
<div class="col-sm-8">
<div class="input-group">
<div class="input-group"><span class="input-group-btn"><button type="button" class="btn btn-primary">-</button></span><input style="width: 100px; text-align: center;" type="text" id="tzs_fs_3" name="tzs_fs_3" value="0" class="form-control tzs_fs_3 initialized" placeholder="输入 Tzs fs 3"><span class="input-group-btn"><button type="button" class="btn btn-success">+</button></span></div>
</div>
</div>
</div>
<div class="form-group  ">
<label for="tzs_fs_4" class="col-sm-2  control-label">其他各方份数</label>
<div class="col-sm-8">
<div class="input-group">
<div class="input-group"><span class="input-group-btn"><button type="button" class="btn btn-primary">-</button></span><input style="width: 100px; text-align: center;" type="text" id="tzs_fs_4" name="tzs_fs_4" value="0" class="form-control tzs_fs_4 initialized" placeholder="输入 Tzs fs 4"><span class="input-group-btn"><button type="button" class="btn btn-success">+</button></span></div>
</div>
</div>
</div>
<div class="form-group  ">
<label for="notes" class="col-sm-2  control-label">备注</label>
<div class="col-sm-8">
<textarea name="notes" class="form-control notes" rows="5" placeholder="输入 备注"></textarea>
</div>
</div>
<div class="form-group  ">
<label for="issue_time" class="col-sm-2  control-label">盖章及签字时间</label>
<div class="col-sm-8">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
<input style="width: 160px" type="text" id="issue_time" name="issue_time" value="2019-04-16 18:09:33" class="form-control issue_time" placeholder="输入 Issue time">
</div>
</div>
</div>
<div class="form-group  ">
<label for="file_path" class="col-sm-2  control-label">通知书附件</label>
<div class="col-sm-8">
<div class="file-input file-input-new"><div class="file-preview ">
<button type="button" class="close fileinput-remove" aria-label="Close">
<span aria-hidden="true">×</span>
</button><div class="file-drop-disabled">
<div class="file-preview-thumbnails">
</div>
<div class="clearfix"></div><div class="file-preview-status text-center text-success"></div>
<div class="kv-fileinput-error file-error-message" style="display: none;"></div>
</div>
</div>
<div class="kv-upload-progress kv-hidden" style="display: none;"><div class="progress">
<div class="progress-bar bg-success progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
        0%
</div>
</div></div><div class="clearfix"></div>
<div class="input-group file-caption-main">
<div class="file-caption form-control  kv-fileinput-caption" tabindex="500">
<span class="file-caption-icon"></span>
<input class="file-caption-name" onkeydown="return false;" onpaste="return false;" placeholder="Select file...">
</div>
<div class="input-group-btn input-group-append">
<button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default btn-secondary kv-hidden fileinput-cancel fileinput-cancel-button"><i class="glyphicon glyphicon-ban-circle"></i><span class="hidden-xs">Cancel</span></button>
<div tabindex="500" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;<span class="hidden-xs">浏览</span><input type="file" class="file_path" name="file_path" id="1555438177916_52"></div>
</div>
</div></div>
</div>
</div>
</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<input type="hidden" name="_token" value="OKuPRsP9HNMAURVKJ2TysbqL51fdYwynIQ3oXPzN"><div class="col-md-2">
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
<input type="hidden" name="_previous_" value="http://zhaeec.test/admin/winnotices" class="_previous_"><!-- /.box-footer -->
</form>
</div>