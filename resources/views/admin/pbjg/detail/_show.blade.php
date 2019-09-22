        <form action="/admin/pbjg/insert" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
          {{csrf_field()}}
          <input type="hidden" id="id" name="id" value="{{$sub->id}}">
          <input type="hidden" id="bid_result_id" name="bid_result_id" value="{{$sub->bid_result_id}}">
          
          <div id="inputcontent">
              <div class="input-group">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td class=" control-label">投标人</td>
                        <td colspan="5">
                          {{$sub->tbr}}
                        </td>
                      </tr>
                      <tr>
                        <td class=" control-label">经济分</td>
                        <td>
                          {{$sub->jjf}}
                        </td>
                        <td class=" control-label">技术分</td>
                        <td>
                          {{$sub->jsf}}
                        </td>
                        <td class=" control-label">总分</td>
                        <td>
                          {{$sub->zf}}
                        </td>
                      </tr>
                      <tr>
                        <td class=" control-label">投标报价</td>
                        <td colspan="3">
                          {{$sub->tbbj}}
                        </td>
                        <td class=" control-label">排名</td>
                        <td>{{$sub->pm}}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
          </div>
        </form>