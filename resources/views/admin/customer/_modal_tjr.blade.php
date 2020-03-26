<!-- 模态框（Modal） -->
<div class="modal fade" id="tjrModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">客户信息查询</h4>
            </div>
            <div class="modal-body">
                <div>
                    <form id="frm_tjrsearch">
                        <input type="hidden" id="search_is_member" name="search_is_member" value="1">
                        {{ csrf_field() }}
                        <table>
                            <tbody>
                                <tr>
                                    <td>客户名称：</td>
                                    <td><input type="text" id="search_name" name="search_name" value="" class="form-control" placeholder="输入 客户名称"></td>
                                    <td>证件号码：</td>
                                    <td><input type="text" id="search_code" name="search_code" value="" class="form-control" placeholder="输入 证件号码"></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-default" id="customer_search" style="float:right;"><i class="fa fa-list"></i> 查询</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <br>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>客户名称</td>
                                <td>证件号码</td>
                                <td>电话</td>
                                <td>操作</td>
                            </tr>
                        </thead>
                        <tbody id="customerlist">
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script type="text/javascript">
    $(function () {
        $('#tjrModal #customer_search').on('click', function () {
          var customers = {};
          var url = "/admin/customer/search/member";
          
          // var param = getFormToJson();
          var param = new FormData($('#frm_tjrsearch')[0]);
          $.ajax({
            type : "post",
            url : url,
            data : param,
            cache: false,
            processData: false,
            contentType: false,
            success : function(str_reponse){
                customers = str_reponse.customers;
                var html = "<tr>";
                for (var i = 0;i<customers.length;i++) {
                    var customer = customers[i];
                    html += '<tr id="'+i+'">'
                        +'<td>'+customer.name+'<\/td>'
                        +'<td>'+customer.certificate_code+'<\/td>'
                        +'<td>'+customer.phone+'<\/td>'
                        +'<td><a href="javascript:void(0);" class="choise" data-index="'+i+'">选择<\/a><\/td>';
                }
                html += '<\/tr>';
          
                $("#tjrModal #customerlist").html(html);
                $('.choise').on('click', function () {
                    var i = $(this).data('index');
                    var customer = customers[i];
                    autoFill(customer);
                    $('#tjrModal').modal('hide');
                });
                // if($("#id").val() == ""){
                //     console.log(str_reponse.message.id);
                //     // $("#id").val(str_reponse.detail_id)
                //     $(".id").val(str_reponse.message.id);
                //     $(".project_id").val(str_reponse.message.project_id);
                //     $(".xmbh").val(str_reponse.xmbh);
                // }
            },
            error : function(XMLHttpRequest,err,e){
              // error(XMLHttpRequest);
            }
          });
        });
        function autoFill(customer){
            $('#customer_id').val(customer.id);
            $('#tjr').val(customer.name);
        }

    });
</script>