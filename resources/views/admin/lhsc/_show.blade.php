 <form action="/admin/winnotices/add" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formdetail">    
    {{ csrf_field() }}
    <input type="hidden" id="project_id" name="project_id" value="{{$detail->project_id}}" class="project_id">
    <input type="hidden" id="id" name="id" value="{{$detail->id}}" class="id">
    <input type="hidden" id="projecttype" name="projecttype" value="{{$projecttype}}" class="projecttype">
<div class="fields-group">
          <div  class="row">
            <div class="col-lg-12 offset-lg-1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                  	<th rowspan="2">名称</th>
	                  <th rowspan="2">类型</th>
	                  <th rowspan="2">状态</th>
	                  <th colspan="2">平台方意见</th>
	                  
	                  <th colspan="2">委托方意见</th>
                  </tr>
                  <tr>
	                  <th>操作</th>
	                  <th>意见</th>
	                  <th>操作</th>
	                  <th>意见</th>
                  </tr>
                </thead>
                <tbody id="yxflist">
                  
                </tbody>
              </table>
            </div>
          </div>
          <script>
            $(function () {
              function getlist(){
                var listhtml ="";
                var i = 0;
                @foreach($yxfs as $yxf)
                listhtml +='<tr>'+
                  '<td>{{$yxf->name}}<\/td>'+
                  '<td>'+select_datas['customertype']['{{$yxf->type}}']+'<\/td>'+
                  '<td>{{$yxf->process_name}}<\/td>'+
                  '<td>'+
                      getSelect(i,'ptf_opinion','{{$yxf->ptf_opinion}}')+
                  '<\/td>'+
                  '<td><input type="text" id="ptf_desc'+i+'" name="ptf_desc'+i+'" value="{{$yxf->ptf_desc}}"><\/td>'+
                  '<td>'+
                      getSelect(i,'wtf_opinion','{{$yxf->wtf_opinion}}')+
                  '<\/td>'+
                  '<td><input type="text" id="wtf_desc'+i+'" name="wtf_desc'+i+'" value="{{$yxf->wtf_desc}}"><\/td>'+
                  
                '</tr>';
                i++;
                @endforeach
                $('#yxflist').html(listhtml);
              }
              function getSelect(i,tab_name,tab_value){
              	var select_html = "";
              	var checked1 = '';
              	var checked2 = '';
              	if(tab_value=="1"){
              		checked1 = 'selected';
              	}
              	else if(tab_value=="2"){
              		checked2 = 'selected';
              	}
              	select_html += '<select id="'+tab_name+i+'" name="'+tab_name+i+'"><option value="1"'+ checked1+'>通过</option><option value="2" '+checked2+'>不通过</option></select>';
              	return select_html;
              }
              
              getlist();
            });
          </script>

<div class="form-group  ">
	<div class="col-md-8">
        <div class="btn-group pull-right">
          	
        </div>
    </div>
</div>

</div>
<script>
    $(function () {

        //日期
        $('.date').parent().datetimepicker({
          "format":"YYYY-MM-DD",
          "locale":"zh-CN",
          "allowInputToggle":true
        });

        //金额、数字
        // $('.price_total').inputmask({"alias":"decimal","rightAlign":true});
        // $('.price_unit').inputmask({"alias":"decimal","rightAlign":true});
        $('.money').inputmask({"alias":"decimal","rightAlign":true});
        //下拉框
        $('#date_type').selecter({
          autoSelect: false,
          type: "date_type",
          savetype: 2,
          selectvalue: "{{$detail->date_type}}"
        });

    function noEdit(){
      $("#formdetail input").attr("disabled","disabled");
      $("#formdetail select").attr("disabled","disabled");
      $("#formdetail textarea").attr("disabled","disabled");
    }
    noEdit();
    });
    </script> 
</form>