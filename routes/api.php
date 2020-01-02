<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

$api = app('Dingo\Api\Routing\Router');

/*
$api->version('v1', function($api) {
    $api->get('version', function() {
        return response('this is version v1');
    });
});
*/
$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => 'serializer:array'
], function($api) {
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ], function($api) {
        // 短信验证码
     //    $api->post('verificationCodes', 'VerificationCodesController@store')
     //        ->name('api.verificationCodes.store');
     //    // 用户注册
     //    $api->post('users', 'UsersController@store')
     //        ->name('api.users.store');
     //    // 图片资源
    	// $api->post('images', 'ImagesController@store')
     //    	->name('api.images.store');

             
    });

    Route::group([
        'prefix'        => config('admin.route.prefix'),
        'namespace'     => config('admin.route.namespace'),
        'middleware'    => config('admin.route.middleware'),
    ], function ($api) {
    // $api->post('zczl/create', 'ProjectLeasesController@store')->name('api.zczl.store');
    // $api->post('zczl/update', 'ProjectLeasesController@update')->name('api.zczl.update');
    // $api->post('qycg/create', 'ProjectPurchasesController@store')->name('api.qycg.store');
    // $api->post('qycg/update', 'ProjectPurchasesController@update')->name('api.qycg.update');
    });

    //采购请求    
    $api->post('qycg/create', 'JgptProjectPurchasesController@store')->name('api.qycg.store');
    //采购撤销  
    $api->post('qycg/cancel', 'JgptProjectPurchasesController@cancel')->name('api.qycg.cancel');
    //评标结果  
    // $api->post('qycg/pbresult', 'JgptProjectPurchasesController@pbResult')->name('api.qycg.pbresult');
    //评标结果  
    $api->post('qycg/cjgg', 'JgptProjectPurchasesController@cjgg')->name('api.qycg.cjgg');
    //上传合同  
    $api->post('qycg/contract', 'JgptProjectPurchasesController@contract')->name('api.qycg.contract');
    //采购请求附件
    $api->post('qycg/files', 'JgptProjectPurchasesController@files')->name('api.qycg.files');

    //租赁请求    
    $api->post('zczl/create', 'JgptProjectLeasesController@store')->name('api.zczl.store');
    //租赁撤销  
    $api->post('zczl/cancel', 'JgptProjectLeasesController@cancel')->name('api.zczl.cancel');
    //竞价结果  
    $api->post('zczl/jjresult', 'JgptProjectLeasesController@pbResult')->name('api.zczl.jjresult');
    //上传合同  
    $api->post('zczl/contract', 'JgptProjectLeasesController@contract')->name('api.zczl.contract');

    $api->post('zczl/files', 'JgptProjectLeasesController@files')->name('api.zczl.files');
    $api->post('zczl/file', 'JgptProjectLeasesController@file')->name('api.zczl.file');

    $api->post('project/search', 'SearchController@search')->name('api.project');
    $api->post('project/list', 'SearchController@getProjectList')->name('api.project.list');
    $api->post('project/list/gp', 'SearchController@getProjectGpList')->name('api.project.list.gp');
    $api->post('project/info', 'SearchController@getProjectInfo')->name('api.project.info');
    $api->post('notice/list', 'SearchController@getNoteList')->name('api.notice.list');
    $api->post('notice/info', 'SearchController@getNoteInfo')->name('api.notice.info');


    //测试接口   模仿国资委接收接口    
    $api->post('purchases/rebackdatas', 'JgptProjectPurchasesController@rebackDatas')->name('api.qycg.rebackdatas');
      
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});
