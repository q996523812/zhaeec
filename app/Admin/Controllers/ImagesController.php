<?php

namespace App\Admin\Controllers;

use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\ProjectPurchase;
use App\Models\IntentionalParty;
use App\Models\Transaction;
use App\Models\TransactionAnnouncement;
use App\Models\WinNotice;
use App\Models\PaymentNotice;
use App\Models\Contract;
use App\Models\BidResult;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;
use App\Transformers\ImageTransformer;
use App\Http\Requests\ImageRequest;
use App\Services\ImageService;
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
        $size = 1024;
        $filetable_id = $request->id;
        $projecttype = $request->projecttype;
        $model_class = $this->getModelClass($projecttype);
        $model = $model_class::find($filetable_id);
        $folder = $this->getFolder($projecttype);

        $service = new ImageService();
        $file = $service->add($model,$folder,$request->image,$size);

        $result = [
            'success' => 'true',
            'message' => '',
            'file' => $file,
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

    public function getModelClass($type){
        $model = null;
        switch($type){
            case 'zczl':
                $model = ProjectLease::class;
                break;
            case 'yxdj':
                $model = IntentionalParty::class;
                break;    
            case 'qycg':
                $model = ProjectPurchase::class;
                break;
            case 'cjxx':
                $model = Transaction::class;
                break;
            case 'cjgg':
                $model = TransactionAnnouncement::class;
                break;
            case 'zbtz':
                $model = WinNotice::class;
                break;
            case 'jftz':
                $model = PaymentNotice::class;
                break;
            case 'htxx':
                $model = Contract::class;
                break;
            case 'pbjg':
                $model = BidResult::class;
                break;
            
        }
        return $model;
    }
    public function getFolder($type){
        $folder = null;
        switch($type){
            case 'zczl':
                $folder = 'zczl';
                break;
            case 'yxdj':
                $folder = 'yxf';
                break;
            case 'yxdj':
                $folder = 'qycg';
                break;
        }
        return $folder;
    }
}
