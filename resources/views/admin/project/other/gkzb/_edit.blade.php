      <div>
        <table class="table table-bordered">
          <tbody id="pbresultsList">
            <tr>
              <td>投标人</td>
              <td>经济分</td>
              <td>技术分</td>
              <td>总分</td>
              <td>投标报价</td>
              <td>排名</td>
              <td>操作</td>
            </tr>
            @foreach($pbresults as $pbresult)
            <tr>
              <td>{{$pbresult->tbr}}</td>
              <td>{{$pbresult->jjf}}</td>
              <td>{{$pbresult->jsf}}</td>
              <td>{{$pbresult->zf}}</td>
              <td>{{$pbresult->tbbj}}</td>
              <td>{{$pbresult->pm}}</td>
              <td><a href="#">删除</a></td>
            </tr>
             @endforeach
          </tbody>
        </table>
      </div>
      <div>
        <form action="/admin/projectpurchases/pb/{{$detail->project_id}}" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
          {{csrf_field()}}
          <input type="hidden" id="operation" name="operation" value="通过">
          <input type="hidden" id="process" name="process" value="">
          <input type="hidden" id="pb_id" name="pb_id" value="">
          
          <div id="inputcontent">
              <div class="input-group">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>投标人</td>
                        <td colspan="5"><input type="text" id="tbr" name="tbr" value="" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>经济分</td>
                        <td><input type="text" id="jjf" name="jjf" value="" class="form-control"></td>
                        <td>技术分</td>
                        <td><input type="text" id="jsf" name="jsf" value="" class="form-control"></td>
                        <td>总分</td>
                        <td><input type="text" id="zf" name="zf" value="" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>投标报价</td>
                        <td colspan="3"><input type="text" id="tbbj" name="tbbj" value="" class="form-control"></td>
                        <td>排名</td>
                        <td><input type="text" id="pm" name="pm" value="" class="form-control"></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
          </div>
          <div class="btn-group pull-right">
              <button type="buttion" id="btnSaveData" class="btn btn-primary btn-pass" style="margin-right:100px;">保存</button>
          </div>
      <script>
        $(document).ready(function(){
          $('#btnSaveData').on('click', function () {
              var param = {
                "project_id" : "{{$detail->project_id}}",
                "xmbh" : "{{$detail->xmbh}}",
                "title" : "{{$detail->title}}",
                "tbr" : $("#tbr").val(),
                "jjf" : $("#jjf").val(),
                "jsf" : $("#jsf").val(),
                "zf" : $("#zf").val(),
                "tbbj" : $("#tbbj").val(),
                "pm" : $("#pm").val()
              }
              $.post("/admin/pbresults/insert",param,function(data,status,xhr){
                if(data["success"] == "true"){
                  var pb = data["pb"];
                  var row = "<tr><td>"+pb['tbr']+"</td><td>"+pb['jjf']+"</td><td>"+pb['jsf']+"</td><td>"+pb['zf']+"</td><td>"+pb['tbbj']+"</td><td>"+pb['pm']+"</td><td><a href=''>删除</a></td></tr>"
                  $("#pbresultsList").append(row);
                  $("#inputcontent input").val("");
                }
              },"json");
              return false;
          });
          // $('.btn-back').on('click', function () {
          //     $("#operation").val("提交");
          //     $("#process").val("21");
          //     $(".form-horizontal").submit();
          //     return false;
          // });

          //$('#tab1 input').attr('disabled','disabled');
          //$('#tab1 txtarea').attr('disabled','disabled');
        });
      </script>          
        </form>     
      </div>    