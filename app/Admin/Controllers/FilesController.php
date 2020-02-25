<?php

namespace App\Admin\Controllers;

use App\Models\File;
use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\ProjectPurchase;
use App\Models\ProjectConveyancing;
use App\Models\ProjectCapitalIncrease;
use App\Models\ProjectTransferAsset;
use App\Models\IntentionalParty;
use App\Models\Transaction;
use App\Models\TransactionAnnouncement;
use App\Models\WinNotice;
use App\Models\PaymentNotice;
use App\Models\Contract;
use App\Models\BidResult;
use App\Models\TransactionMode;
use App\Models\TransactionConfirmation;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Handlers\FileUploadHandler;
use App\Transformers\FileTransformer;
use App\Http\Requests\FileRequest;
use App\Services\FileService;
use Illuminate\Support\Str;

class FilesController extends Controller
{
    use HasResourceActions;

    public function store(FileRequest $request, FileUploadHandler $uploader, File $file)
    {
        $filetable_id = $request->id;
        $projecttype = $request->projecttype;
        $model_class = $this->getModelClass($projecttype);
        $model = $model_class::find($filetable_id);
        $folder = $this->getFolder($projecttype);

        $service = new FileService();
        $file = $service->add($model,$folder,$request->file);

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

    public function getModelClass($type){
        $model = null;
        switch($type){
            case 'zczl':
                $model = ProjectLease::class;
                break;
            case 'qycg':
                $model = ProjectPurchase::class;
                break;
            case 'cqzr':
                $model = ProjectConveyancing::class;
                break;
            case 'zzkg':
                $model = ProjectCapitalIncrease::class;
                break;
            case 'zczr':
                $model = ProjectTransferAsset::class;
                break;
                
            case 'yxdj':
                $model = IntentionalParty::class;
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
            case 'sftz':
                $model = PaymentNotice::class;
                break;
            case 'htxx':
                $model = Contract::class;
                break;
            case 'pbjg':
                $model = BidResult::class;
                break;
            case 'jyfs':
                $model = TransactionMode::class;
                break;
            case 'jyjz':
                $model = TransactionConfirmation::class;
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
