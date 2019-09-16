<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    /****************1、项目类********************/
    $router->get('projects', 'ProjectsController@index')->name('projects.index');
    $router->get('projects/{id}/edit', 'ProjectsController@edit');
    $router->get('projects/{id}', 'ProjectsController@show');
    $router->get('projects/showapproval/{id}', 'ProjectsController@showapproval');
    $router->post('projects/approval', 'ProjectsController@approval');

    //列表页面
    $router->get('qycg', 'ProjectPurchasesController@index')->name('qycg.index');
    //打开新增页面
    $router->get('qycg/create', 'ProjectPurchasesController@create');
    //新增
    $router->post('qycg', 'ProjectPurchasesController@insert');
    //打开修改页面
    $router->get('qycg/{id}/edit', 'ProjectPurchasesController@edit');
    //修改
    // $router->put('qycg/{id}', 'ProjectPurchasesController@update');
    $router->post('qycg/update', 'ProjectPurchasesController@modify');
    //打开查看页面
    $router->get('qycg/{id}', 'ProjectPurchasesController@show');
    //提交审批
    $router->post('qycg/submit', 'ProjectPurchasesController@submit');
    //打开摘牌页面
    $router->get('qycg/showzp/{id}', 'ProjectPurchasesController@showzp');
    //摘牌
    $router->post('qycg/zp/{id}', 'ProjectPurchasesController@zp');
    //打开评标页面
    $router->get('qycg/editpb/{id}', 'ProjectPurchasesController@editpb');
    //保存评标信息
    $router->post('qycg/pb/{id}', 'ProjectPurchasesController@pb');
    //复制一个项目
    $router->get('qycg/copy/{id}', 'ProjectPurchasesController@copy');
    //打开管理页面
    $router->get('qycg/manage/{id}', 'ProjectPurchasesController@manage');
    //打开打印页面
    $router->get('qycg/print/{id}', 'ProjectPurchasesController@print');
    $router->get('qycg/approval/{id}', 'ProjectPurchasesController@approval');
    

    $router->get('zczl', 'ProjectLeasesController@index')->name('zczl.index');
    $router->get('zczl/create', 'ProjectLeasesController@create');
    $router->post('zczl', 'ProjectLeasesController@insert');
    $router->get('zczl/{id}/edit', 'ProjectLeasesController@edit');
    // $router->put('zczl/{id}', 'ProjectLeasesController@update');
    $router->post('zczl/update', 'ProjectLeasesController@modify');
    $router->get('zczl/{id}', 'ProjectLeasesController@show');
    $router->post('zczl/submit', 'ProjectLeasesController@submit');
    $router->get('zczl/showzp/{id}', 'ProjectLeasesController@showzp');
    $router->post('zczl/zp/{id}', 'ProjectLeasesController@zp');
    $router->get('zczl/editjj/{id}', 'ProjectLeasesController@editjj');
    $router->post('zczl/jj', 'ProjectLeasesController@jj');
    $router->get('zczl/copy/{id}', 'ProjectLeasesController@copy');
    $router->get('zczl/manage/{id}', 'ProjectLeasesController@manage');
    $router->get('zczl/print/{id}', 'ProjectLeasesController@print');
    $router->get('zczl/approval/{id}', 'ProjectLeasesController@approval');
    
    /****************2、文件与图片********************/
    $router->post('images/store', 'ImagesController@store');
    $router->post('images/destroy', 'ImagesController@destroy');    
    $router->post('files/store', 'FilesController@store');
    $router->post('files/destroy', 'FilesController@destroy');

    /****************3、意向登记报名********************/
    //意向方
    $router->get('yxdj', 'IntentionalPartiesController@index')->name('yxdj.index');
    $router->get('yxdj/create/{project_id}', 'IntentionalPartiesController@create');
    $router->get('yxdj/edit/{id}', 'IntentionalPartiesController@edit');
    $router->get('yxdj/{id}', 'IntentionalPartiesController@show');
    $router->post('yxdj/insert', 'IntentionalPartiesController@add');
    $router->post('yxdj/modify', 'IntentionalPartiesController@update');
    $router->post('yxdj/submit/', 'IntentionalPartiesController@submit');

    $router->get('yxdj/showapproval/{id}', 'IntentionalPartiesController@showapproval');
    $router->post('yxdj/approval', 'IntentionalPartiesController@approval');
    $router->get('yxdj/showconfirm/{id}', 'IntentionalPartiesController@showconfirm');
    $router->post('yxdj/confirm/{id}', 'IntentionalPartiesController@confirm');

    $router->get('yxdj/list/edit/{project_id}', 'IntentionalPartiesController@listEdit');
    $router->get('yxdj/list/show/{project_id}', 'IntentionalPartiesController@listShow');

    /****************4、评标结果********************/
    //评标结果
    $router->get('pbresults', 'PbResultsController@index')->name('pbresults.index');
    $router->get('pbresults/create', 'PbResultsController@create');
    $router->post('pbresults', 'PbResultsController@store');
    $router->get('pbresults/{id}/edit', 'PbResultsController@edit');
    $router->put('pbresults/{id}', 'PbResultsController@update');
    $router->get('pbresults/{id}', 'PbResultsController@show');
    $router->post('pbresults/insert', 'PbResultsController@insert');

    /****************5、成交信息********************/
    //成交信息
    $router->get('cjxx', 'TransactionsController@index')->name('cjxx.index');
    $router->get('cjxx/edit/{project_id}', 'TransactionsController@edit');
    $router->get('cjxx/show/{id}', 'TransactionsController@show');
    $router->get('cjxx/approval/{project_id}', 'TransactionsController@approval');
    $router->post('cjxx/insert', 'TransactionsController@insert');
    $router->post('cjxx/modify', 'TransactionsController@modify');
    $router->post('cjxx/submit', 'TransactionsController@submit');

    /****************6、成交公告********************/
    $router->get('cjgg', 'TransactionAnnouncementsController@index')->name('cjgg.index');
    $router->get('cjgg/edit/{project_id}', 'TransactionAnnouncementsController@edit');
    $router->get('cjgg/show/{id}', 'TransactionAnnouncementsController@show');
    $router->get('cjgg/approval/{project_id}', 'TransactionAnnouncementsController@approval');
    $router->get('cjgg/print/{id}', 'TransactionAnnouncementsController@print');
    $router->post('cjgg/insert', 'TransactionAnnouncementsController@insert');
    $router->post('cjgg/modify', 'TransactionAnnouncementsController@modify');
    $router->post('cjgg/submit', 'TransactionAnnouncementsController@submit');

    /****************7、中标通知********************/
    $router->get('zbtz', 'WinNoticesController@index')->name('zbtz.index');
    $router->get('zbtz/edit/{project_id}', 'WinNoticesController@edit');
    $router->get('zbtz/show/{id}', 'WinNoticesController@show');
    $router->get('zbtz/approval/{project_id}', 'WinNoticesController@approval');
    $router->get('zbtz/print/{id}', 'WinNoticesController@print');
    $router->post('zbtz/insert', 'WinNoticesController@insert');
    $router->post('zbtz/modify', 'WinNoticesController@modify');
    $router->post('zbtz/submit', 'WinNoticesController@submit');

    /****************8、收费通知********************/
    $router->get('sftz', 'PaymentNoticesController@index')->name('sftz.index');
    $router->get('sftz/edit/{project_id}', 'PaymentNoticesController@edit');
    $router->get('sftz/show/{id}', 'PaymentNoticesController@show');
    $router->get('sftz/approval/{project_id}', 'PaymentNoticesController@approval');
    $router->get('sftz/print/zbf/{id}', 'PaymentNoticesController@printZbf');
    $router->get('sftz/print/wtf/{id}', 'PaymentNoticesController@printWtf');
    $router->post('sftz/insert', 'PaymentNoticesController@insert');
    $router->post('sftz/modify', 'PaymentNoticesController@modify');
    $router->post('sftz/submit', 'PaymentNoticesController@submit');

    /****************9、成交确认书（交易鉴证）********************/
    $router->get('jyjz', 'TransactionConfirmationsController@index')->name('jyjz.index');
    $router->get('jyjz/edit/{project_id}', 'TransactionConfirmationsController@edit');
    $router->get('jyjz/show/{id}', 'TransactionConfirmationsController@show');
    $router->get('jyjz/approval/{project_id}', 'TransactionConfirmationsController@approval');
    $router->get('jyjz/print/{id}', 'TransactionConfirmationsController@print');
    $router->post('jyjz/insert', 'TransactionConfirmationsController@insert');
    $router->post('jyjz/modify', 'TransactionConfirmationsController@modify');
    $router->post('jyjz/submit', 'TransactionConfirmationsController@submit');

    /****************10、合同********************/
    $router->get('htxx', 'ContractsController@index')->name('htxx.index');
    $router->get('htxx/edit/{project_id}', 'ContractsController@edit');
    $router->get('htxx/show/{id}', 'ContractsController@show');
    $router->get('htxx/approval/{project_id}', 'ContractsController@approval');
    $router->post('htxx/insert', 'ContractsController@insert');
    $router->post('htxx/modify', 'ContractsController@modify');
    $router->post('htxx/submit', 'ContractsController@submit');


    /****************10、其他相关********************/
    //保证金账户

    //收费规则

    //收费规则子表


    /****************11、公告********************/
    //其他公告
    $router->get('suspends', 'SuspendsController@index')->name('suspends.index');
    $router->get('suspends/create', 'SuspendsController@create');
    $router->post('suspends', 'SuspendsController@store');
    $router->get('suspends/{id}/edit', 'SuspendsController@edit');
    $router->post('suspends/update', 'SuspendsController@update');
    $router->get('suspends/{id}', 'SuspendsController@show');    
    $router->post('suspends/add', 'SuspendsController@add');
    $router->get('suspends/pause/{id}', 'SuspendsController@pause');
    $router->get('suspends/recover/{id}', 'SuspendsController@recover');
    $router->get('suspends/end/{id}', 'SuspendsController@end');
    $router->post('suspends/submit/{project_id}', 'SuspendsController@submit');

    /****************12、流程设置********************/
    $router->get('workprocesses', 'WorkProcessesController@index')->name('workprocess.index');
    $router->get('workprocesses/create', 'WorkProcessesController@create');
    $router->post('workprocesses', 'WorkProcessesController@add');
    $router->get('workprocesses/{id}/edit', 'WorkProcessesController@edit');
    $router->put('workprocesses/{id}', 'WorkProcessesController@update');

    $router->get('workprocessnodes', 'WorkProcessNodesController@index')->name('workprocessnodes.index');
    $router->get('workprocessnodes/create', 'WorkProcessNodesController@create');
    $router->post('workprocessnodes', 'WorkProcessNodesController@add');
    $router->get('workprocessnodes/{id}/edit', 'WorkProcessNodesController@edit');
    $router->put('workprocessnodes/{id}', 'WorkProcessNodesController@update');

    /****************13、接口操作********************/
    //企业采购
    $router->get('jgpt/qycg', 'JgptProjectPurchasesController@index')->name('jgpt.qycg.index');
    $router->get('jgpt/qycg/{id}', 'JgptProjectPurchasesController@show');
    $router->get('jgpt/qycg/edit/{id}', 'JgptProjectPurchasesController@edit');
    $router->post('jgpt/qycg/receive', 'JgptProjectPurchasesController@receive');
    
    // $router->put('jgptprojectpurchases/{id}', 'JgptProjectPurchasesController@back');
    //资产租赁
    $router->get('jgpt/zczl', 'JgptProjectLeasesController@index')->name('jgpt.zczl.index');
    $router->get('jgpt/zczl/create', 'JgptProjectLeasesController@create');
    $router->post('jgpt/zczl', 'JgptProjectLeasesController@store');
    $router->get('jgpt/zczl/edit/{id}', 'JgptProjectLeasesController@edit');
    $router->put('jgpt/zczl/{id}', 'JgptProjectLeasesController@update');
    $router->get('jgpt/zczl/{id}', 'JgptProjectLeasesController@show');
    $router->post('jgpt/zczl/receive', 'JgptProjectLeasesController@receive');
    $router->get('jgpt/zczl/sendGp/{id}', 'JgptProjectLeasesController@sendGp');
    $router->get('jgpt/zczl/sendZbNotice/{id}', 'JgptProjectLeasesController@sendZbNotice');


});
