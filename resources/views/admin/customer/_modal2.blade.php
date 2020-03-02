<!-- 模态框（Modal） -->
<div class="modal fade" id="customerModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        $('#customerModal2 #customer_search').on('click', function () {
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
          
                $("#customerModal2 #customerlist").append(html);
                $('.choise').on('click', function () {
                    var i = $(this).data('index');
                    var customer = customers[i];
                    autoFill(customer);
                    $('#customerModal2').modal('hide')
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
        function autoFill(customer){formZrf
            $('#formZrf #type').val(customer.type);
            $('#formZrf #name').val(customer.name);
            $('#formZrf #certificate_type').val(customer.certificate_type);
            $('#formZrf #certificate_code').val(customer.certificate_code);
            $('#formZrf #industry1').val(customer.industry1);
            $('#formZrf #industry2').val(customer.industry2);
            $('#formZrf #financial_industry1').val(customer.financial_industry1);
            $('#formZrf #financial_industry2').val(customer.financial_industry2);
            $('#formZrf #found_date').val(customer.found_date);
            $('#formZrf #province').val(customer.province);
            $('#formZrf #city').val(customer.city);
            $('#formZrf #county').val(customer.county);
            $('#formZrf #address').val(customer.address);
            $('#formZrf #companytype').val(customer.companytype);
            $('#formZrf #economytype').val(customer.economytype);
            $('#formZrf #scope').val(customer.scope);
            $('#formZrf #funding').val(customer.funding);
            $('#formZrf #currency').val(customer.currency);
            $('#formZrf #boss').val(customer.boss);
            $('#formZrf #scale').val(customer.scale);
            $('#formZrf #workers_num').val(customer.workers_num);
            $('#formZrf #inner_audit').val(customer.inner_audit);
            $('#formZrf #inner_audit_desc').val(customer.inner_audit_desc);
            $('#formZrf #Shareholder_num').val(customer.Shareholder_num);
            $('#formZrf #stock_num').val(customer.stock_num);
            $('#formZrf #sfhygyhbtd').val(customer.sfhygyhbtd);
            $('#formZrf #sfgz').val(customer.sfgz);
            $('#formZrf #work_unit').val(customer.work_unit);
            $('#formZrf #work_duty').val(customer.work_duty);
            $('#formZrf #fax').val(customer.fax);
            $('#formZrf #phone').val(customer.phone);
            $('#formZrf #email').val(customer.email);
            $('#formZrf #ssjt').val(customer.ssjt);
            $('#formZrf #qualification').val(customer.qualification);
            $('#formZrf #mailing_address').val(customer.mailing_address);
            $('#formZrf #type').change();
        }

    });
</script>