<!-- 模态框（Modal） -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">客户信息查询</h4>
            </div>
            <div class="modal-body">
                <div>
                    <form id="frm_customersearch">
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
        var customers = {};
        $('#customer_search').on('click', function () {
            customers = {};
          var url = "/admin/customer/search";
          
          // var param = getFormToJson();
          var param = new FormData($('#frm_customersearch')[0]);
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
          
                $("#customerlist").append(html);
                $('.choise').on('click', function () {
                    var i = $(this).data('index');
                    var customer = customers[i];
                    autoFill(customer);
                    $('#customerModal').modal('hide')
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
            $('#type').val(customer.type);
            $('#name').val(customer.name);
            $('#certificate_type').val(customer.certificate_type);
            $('#certificate_code').val(customer.certificate_code);
            $('#industry1').val(customer.industry1);
            $('#industry2').val(customer.industry2);
            $('#financial_industry1').val(customer.financial_industry1);
            $('#financial_industry2').val(customer.financial_industry2);
            $('#found_date').val(customer.found_date);
            $('#province').val(customer.province);
            $('#city').val(customer.city);
            $('#county').val(customer.county);
            $('#address').val(customer.address);
            $('#companytype').val(customer.companytype);
            $('#economytype').val(customer.economytype);
            $('#scope').val(customer.scope);
            $('#funding').val(customer.funding);
            $('#currency').val(customer.currency);
            $('#boss').val(customer.boss);
            $('#scale').val(customer.scale);
            $('#workers_num').val(customer.workers_num);
            $('#inner_audit').val(customer.inner_audit);
            $('#inner_audit_desc').val(customer.inner_audit_desc);
            $('#Shareholder_num').val(customer.Shareholder_num);
            $('#stock_num').val(customer.stock_num);
            $('#sfhygyhbtd').val(customer.sfhygyhbtd);
            $('#sfgz').val(customer.sfgz);
            $('#work_unit').val(customer.work_unit);
            $('#work_duty').val(customer.work_duty);
            $('#fax').val(customer.fax);
            $('#phone').val(customer.phone);
            $('#email').val(customer.email);
            $('#ssjt').val(customer.ssjt);
            $('#qualification').val(customer.qualification);
        }

    });
</script>