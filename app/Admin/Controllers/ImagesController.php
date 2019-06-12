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
        $project_id = $request->project_id;
        $size = 1024;
        $result = $uploader->save($request->image, 'project', $project_id, $size);

        $image->path = $result['path'];
        $image->project_id = $project_id;
        $image->save();

        $result = [
            'success' => 'true',
            'message' => '',
            'image' => new ImageTransformer($image),
            'status_code' => '200'
        ];

        return response()->json($result);
        // return $this->response->item($image, new ImageTransformer())->setStatusCode(201);
    }
}
