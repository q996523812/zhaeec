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

    //采购请求    
    $api->post('purchases/create', 'JgptProjectPurchasesController@store')->name('api.purchases.store');
    //采购撤销  
    $api->post('purchases/cancel', 'JgptProjectPurchasesController@cancel')->name('api.purchases.cancel');
    //评标结果  
    $api->post('purchases/pbresult', 'JgptProjectPurchasesController@pbResult')->name('api.purchases.pbresult');
    //上传合同  
    $api->post('purchases/contract', 'JgptProjectPurchasesController@contract')->name('api.purchases.contract');
     
    //租赁请求    
    $api->post('leases/create', 'JgptProjectLeasesController@store')->name('api.leases.store');
    //租赁撤销  
    $api->post('leases/cancel', 'JgptProjectLeasesController@cancel')->name('api.leases.cancel');
    //竞价结果  
    $api->post('leases/jjresult', 'JgptProjectLeasesController@pbResult')->name('api.leases.jjresult');
    //上传合同  
    $api->post('leases/contract', 'JgptProjectLeasesController@contract')->name('api.leases.contract');
    

    //测试接口   模仿国资委接收接口    
    $api->post('purchases/rebackdatas', 'JgptProjectPurchasesController@rebackDatas')->name('api.purchases.rebackdatas');
      
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});
