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
            </tr>
            @if($pbjg->bidResultSubs)
              @foreach($pbjg->bidResultSubs as $sub)
              <tr id="{{$sub->id}}">
                <td>{{$sub->tbr}}</td>
                <td>{{$sub->jjf}}</td>
                <td>{{$sub->jsf}}</td>
                <td>{{$sub->zf}}</td>
                <td>{{$sub->tbbj}}</td>
                <td>{{$sub->pm}}</td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
