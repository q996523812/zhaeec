<form action="/admin/projectleases'" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" id="formimagedel">
                {{ csrf_field() }}
                <input type="hidden" id= "imageid" name="imageid">
          <div class="row clearfix">
            <div class="col-md-12 column">
              <div class="row" id="imageslist">               
                @foreach($images as $image)
                <div class="col-md-3 img" id="{{$image->id}}">                  
                  <div class="thumbnail">                    
                    <img alt="300x200" src="{{$image->path}}"/>
                    <a href="#close" class="remove label label-danger" data="{{$image->id}}">
                      <i class="glyphicon glyphicon-remove"></i>删除
                    </a>
                  </div>
                </div> 
                @endforeach 
              </div>  
            </div>      
          </div>
          </form>
          <div>
            <form action="@yield('submiturl')" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="" enctype="multipart/form-data" id="formimage">
              <div class="fields-group">
                <div class="row">
                  <div class="container table-responsive col-md-12 align-items-center"> 
                    <div class="col-md-8">
                      <input type="hidden" name="id" value="{{$detail->id}}" class="id form-control">
                      <input type="hidden" name="projecttype" value="{{$projecttype}}" class="projecttype">
                      {{csrf_field()}}
                    </div>           
                    
                    <div class="col-md-8">
                      <div class=" ">
                        <label for="image" class=" control-label">选择图片</label>
                        <div class="">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>     
                            <input type="file" id="image" name="image" value="" class="form-control image" >
                          </div>        
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="btn-group pull-right">
                        <button type="button" id="btnSaveImage" class="btn btn-primary btn-pass">保存</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </form>            
          </div>
