<?php

namespace App\Admin\Controllers;

use App\Models\Image;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;
use App\Transformers\ImageTransformer;
use App\Http\Requests\ImageRequest;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ImagesController extends Controller
{
    use HasResourceActions;

    public function store(ImageRequest $request, ImageUploadHandler $uploader, Image $image)
    {
        $table_id = $request->id;
        $size = 1024;
        $result = $uploader->save($request->image, 'project', $table_id, $size);

        $image->path = $result['path'];
        $image->project_id = $table_id;
        $image->save();

        $result = [
            'success' => 'true',
            'message' => '',
            'file' => $image,
            'status_code' => '200'
        ];

        return response()->json($result);
        // return $this->response->item($image, new ImageTransformer())->setStatusCode(201);
    }

    public function destroy(ImageRequest $request){
        $id = $request->imageid;
        // dd('111111111');
        // dd($request->fileid);
        Image::destroy($id);
        $result = [
            'success' => 'true',
            'message' => $request->imageid,
            'status_code' => '200'
        ];
        return response()->json($result);
    }    
}
