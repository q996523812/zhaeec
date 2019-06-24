<?php

namespace App\Admin\Controllers;

use App\Models\File;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Handlers\FileUploadHandler;
use App\Transformers\FileTransformer;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Str;

class FilesController extends Controller
{
    use HasResourceActions;

    public function store(FileRequest $request, FileUploadHandler $uploader, File $file)
    {
        $project_id = $request->project_id;
        $result = $uploader->save($request->file, 'project', $project_id);

        $file->id = (string)Str::uuid();
        $file->name = $request->name;
        $file->path = $result['path'];
        $file->project_id = $project_id;
        $file->save();
// dd(new FileTransformer($file));
        $result = [
            'success' => 'true',
            'message' => '',
            'file' => $file,
            'status_code' => '200'
        ];

        return response()->json($result);
        // return $this->response->item($image, new ImageTransformer())->setStatusCode(201);
    }

    public function destroy(FileRequest $request, File $file){
        $id = $request->fileid;
        // dd('111111111');
        // dd($request->fileid);
        File::destroy($id);
        $result = [
            'success' => 'true',
            'message' => $request->fileid,
            'status_code' => '200'
        ];
        return response()->json($result);
    }
}
