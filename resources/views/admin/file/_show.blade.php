          <div  class="row">
            <div class="col-lg-10 offset-lg-1">
              <table class="table table-bordered">
                <tbody>
                  @foreach($files as $file)
                  <tr>
                    <td><a href="{{$file->path}}">{{$file->name}}</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>