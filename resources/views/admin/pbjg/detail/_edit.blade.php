        <form action="/admin/pbjg/insert" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
          {{csrf_field()}}
          <input type="hidden" id="id" name="id" value="{{$sub->id}}">
          <input type="hidden" id="bid_result_id" name="bid_result_id" value="{{$sub->bid_result_id}}">
          
          <div id="inputcontent">
              <div class="input-group">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>投标人</td>
                        <td colspan="5">
                          <select id="tbr" name="tbr" class="form-control">
                            @foreach($yxfs as $yxf)
                            <option value="{{$yxf->name}}" 
                              @if($sub->jjf == $yxf->name)
                                selected="true"
                              @endif
                              >{{$yxf->name}}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>经济分</td>
                        <td>
                          <input type="text" id="jjf" name="jjf" value="" class="form-control" value="{{$sub->jjf}}">
                        </td>
                        <td>技术分</td>
                        <td><input type="text" id="jsf" name="jsf" value="" class="form-control" value="{{$sub->jsf}}"></td>
                        <td>总分</td>
                        <td><input type="text" id="zf" name="zf" value="" class="form-control" value="{{$sub->zf}}"></td>
                      </tr>
                      <tr>
                        <td>投标报价</td>
                        <td colspan="3">
                          <input type="text" id="tbbj" name="tbbj" value="" class="form-control" value="{{$sub->tbbj}}">
                        </td>
                        <td>排名</td>
                        <td><input type="text" id="pm" name="pm" value="" class="form-control" value="{{$sub->pm}}"></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
          </div>
          <div class="btn-group pull-right">
              <button type="buttion" id="btnSaveData" class="btn btn-primary btn-pass" style="margin-right:200px;">保存</button>
          </div>

        </form>