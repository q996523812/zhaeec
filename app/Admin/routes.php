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

    //预披露
    $router->get('ypl', 'ProjectBeforesController@index')->name('ypl.index');
    $router->get('ypl/create', 'ProjectBeforesController@create');
    $router->post('ypl', 'ProjectBeforesController@insert');
    $router->get('ypl/{id}/edit', 'ProjectBeforesController@edit');
    $router->post('ypl/update', 'ProjectBeforesController@modify');
    $router->get('ypl/{id}', 'ProjectBeforesController@show');
    $router->post('ypl/submit', 'ProjectBeforesController@submit');
    $router->get('ypl/showzp/{id}', 'ProjectBeforesController@showzp');
    $router->post('ypl/zp/{id}', 'ProjectBeforesController@zp');
    $router->get('ypl/copy/{id}', 'ProjectBeforesController@copy');
    $router->get('ypl/manage/{id}', 'ProjectBeforesController@manage');
    $router->get('ypl/print/{id}', 'ProjectBeforesController@print');
    $router->get('ypl/approval/{id}', 'ProjectBeforesController@approval');

    //产权转让
    $router->get('cqzr', 'ProjectConveyancingsController@index')->name('cqzr.index');
    $router->get('cqzr/create', 'ProjectConveyancingsController@create');
    $router->post('cqzr', 'ProjectConveyancingsController@insert');
    $router->get('cqzr/{id}/edit', 'ProjectConveyancingsController@edit');
    $router->post('cqzr/update', 'ProjectConveyancingsController@modify');
    $router->get('cqzr/{id}', 'ProjectConveyancingsController@show');
    $router->post('cqzr/submit', 'ProjectConveyancingsController@submit');
    $router->get('cqzr/showzp/{id}', 'ProjectConveyancingsController@showzp');
    $router->post('cqzr/zp/{id}', 'ProjectConveyancingsController@zp');
    $router->get('cqzr/copy/{id}', 'ProjectConveyancingsController@copy');
    $router->get('cqzr/manage/{id}', 'ProjectConveyancingsController@manage');
    $router->get('cqzr/print/{id}', 'ProjectConveyancingsController@print');
    $router->get('cqzr/approval/{id}', 'ProjectConveyancingsController@approval');

    //增资扩股
    $router->get('zzkg', 'ProjectCapitalIncreasesController@index')->name('zzkg.index');
    $router->get('zzkg/create', 'ProjectCapitalIncreasesController@create');
    $router->post('zzkg', 'ProjectCapitalIncreasesController@insert');
    $router->get('zzkg/{id}/edit', 'ProjectCapitalIncreasesController@edit');
    $router->post('zzkg/update', 'ProjectCapitalIncreasesController@modify');
    $router->get('zzkg/{id}', 'ProjectCapitalIncreasesController@show');
    $router->post('zzkg/submit', 'ProjectCapitalIncreasesController@submit');
    $router->get('zzkg/showzp/{id}', 'ProjectCapitalIncreasesController@showzp');
    $router->post('zzkg/zp/{id}', 'ProjectCapitalIncreasesController@zp');
    $router->get('zzkg/copy/{id}', 'ProjectCapitalIncreasesController@copy');
    $router->get('zzkg/manage/{id}', 'ProjectCapitalIncreasesController@manage');
    $router->get('zzkg/print/{id}', 'ProjectCapitalIncreasesController@print');
    $router->get('zzkg/approval/{id}', 'ProjectCapitalIncreasesController@approval');

    //资产转让
    $router->get('zczr', 'ProjectTransferAssetsController@index')->name('zczr.index');
    $router->get('zczr/create', 'ProjectTransferAssetsController@create');
    $router->post('zczr', 'ProjectTransferAssetsController@insert');
    $router->get('zczr/{id}/edit', 'ProjectTransferAssetsController@edit');
    $router->post('zczr/update', 'ProjectTransferAssetsController@modify');
    $router->get('zczr/{id}', 'ProjectTransferAssetsController@show');
    $router->post('zczr/submit', 'ProjectTransferAssetsController@submit');
    $router->get('zczr/showzp/{id}', 'ProjectTransferAssetsController@showzp');
    $router->post('zczr/zp/{id}', 'ProjectTransferAssetsController@zp');
    $router->get('zczr/copy/{id}', 'ProjectTransferAssetsController@copy');
    $router->get('zczr/manage/{id}', 'ProjectTransferAssetsController@manage');
    $router->get('zczr/print/{id}', 'ProjectTransferAssetsController@print');
    $router->get('zczr/approval/{id}', 'ProjectTransferAssetsController@approval');


    //标的/融资企业基本情况
    $router->post('bdqy', 'TargetCompanyBaseInfosController@insert');
    $router->post('bdqy/update', 'TargetCompanyBaseInfosController@modify');

    //标的/融资企业股权结构
    $router->post('bdqygqjg', 'TargetCompanyOwnershipStructuresController@insert');
    $router->post('bdqygqjg/update', 'TargetCompanyOwnershipStructuresController@modify');

    //审计报告
    $router->post('sjbg', 'AuditReportsController@insert');
    $router->post('sjbg/update', 'AuditReportsController@modify');

    //财务报表
    $router->post('cwbb', 'FinancialStatementsController@insert');
    $router->post('cwbb/update', 'FinancialStatementsController@modify');

    //评估情况
    $router->post('pgqk', 'AssessmentsController@insert');
    $router->post('pgqk/update', 'AssessmentsController@modify');

    //转让方
    $router->post('zrf', 'SellerInfosController@insert');
    $router->post('zrf/update', 'SellerInfosController@modify');

    //监管信息
    $router->post('jgxx', 'SupervisesController@insert');
    $router->post('jgxx/update', 'SupervisesController@modify');

    //标的详情
    $router->post('bdxq', 'AssetInfosController@insert');
    $router->post('bdxq/update', 'AssetInfosController@modify');
    //联系方式
    $router->post('lxfs', 'ContactsController@insert');
    $router->post('lxfs/update', 'ContactsController@modify');

    //挂牌时间
    $router->get('gpsj/edit/{project_id}', 'ProjectBaseController@gpsjEdit');
    $router->post('gpsj/modify', 'ProjectBaseController@gpsjSave');
    $router->post('gpsj/submit', 'ProjectBaseController@gpsjSubmit');
    $router->get('gpsj/approval/{project_id}', 'ProjectBaseController@gpsjApproval');

    //摘牌
    $router->get('zp/edit/{project_id}', 'ProjectBaseController@zpEdit');
    $router->post('zp/{project_id}', 'ProjectBaseController@zp');

    //联合资格审查
    $router->get('lhsc/edit/{project_id}', 'ProjectBaseController@lhscEdit');
    $router->post('lhsc/modify', 'ProjectBaseController@lhscSave');
    $router->post('lhsc/submit', 'ProjectBaseController@lhscSubmit');
    $router->get('lhsc/approval/{project_id}', 'ProjectBaseController@lhscApproval');

    //联合资格审查确认
    $router->get('lhscqr/edit/{project_id}', 'ProjectBaseController@lhscqrEdit');
    $router->post('lhscqr/submit', 'ProjectBaseController@lhscqrSubmit');
    $router->get('lhscqr/approval/{project_id}', 'ProjectBaseController@lhscqrApproval');

    //确认交易方式
    $router->get('jyfs/edit/{project_id}', 'TransactionModesController@edit');
    $router->post('jyfs/insert', 'TransactionModesController@insert');
    $router->post('jyfs/modify', 'TransactionModesController@modify');
    $router->post('jyfs/submit', 'TransactionModesController@submit');
    $router->get('jyfs/approval/{project_id}', 'TransactionModesController@approval');

    //查询所有业务员权限用户
    $router->post('user/business', 'AdminUsersController@getBusinessUsers');



    /****************2、文件与图片********************/
    $router->post('images/store', 'ImagesController@store');
    $router->post('images/destroy', 'ImagesController@destroy');    
    $router->post('files/store', 'FilesController@store');
    $router->post('files/update', 'FilesController@update');
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
    $router->post('yxdj/confirm', 'IntentionalPartiesController@confirm');

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

    $router->get('pbjg/list/edit/{project_id}', 'BidResultsController@edit');
    $router->get('pbjg/list/show/{project_id}', 'BidResultsController@show');
    $router->get('pbjg/list/approval/{project_id}', 'BidResultsController@approval');
    $router->post('pbjg/list/submit', 'BidResultsController@submit');

    $router->get('pbjg/create/{bidResult_id}', 'BidResultSubsController@create');
    $router->get('pbjg/edit/{id}', 'BidResultSubsController@edit');
    $router->get('pbjg/show/{id}', 'BidResultSubsController@show');
    $router->post('pbjg/insert', 'BidResultSubsController@insert');
    $router->post('pbjg/modify', 'BidResultSubsController@modify');



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
    //账户管理

    //收费规则
    $router->post('sfgz/getCharge', 'ChargeRulesController@getCharge');

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

    //公告

    $router->get('zzgg/edit/{project_id}', 'AnnouncementPausesController@edit');
    $router->get('zzgg/show/{id}', 'AnnouncementPausesController@show');
    $router->get('zzgg/approval/{project_id}', 'AnnouncementPausesController@approval');
    $router->get('zzgg/print/{id}', 'AnnouncementPausesController@print');
    $router->get('zzgg/choice/{project_id}', 'AnnouncementPausesController@choice');
    $router->post('zzgg/insert', 'AnnouncementPausesController@insert');
    $router->post('zzgg/modify', 'AnnouncementPausesController@modify');
    $router->post('zzgg/submit', 'AnnouncementPausesController@submit');

    $router->get('hfgg/edit/{project_id}', 'AnnouncementRecoversController@edit');
    $router->get('hfgg/show/{id}', 'AnnouncementRecoversController@show');
    $router->get('hfgg/approval/{project_id}', 'AnnouncementRecoversController@approval');
    $router->get('hfgg/print/{id}', 'AnnouncementRecoversController@print');
    $router->get('hfgg/choice/{project_id}', 'AnnouncementRecoversController@choice');
    $router->post('hfgg/insert', 'AnnouncementRecoversController@insert');
    $router->post('hfgg/modify', 'AnnouncementRecoversController@modify');
    $router->post('hfgg/submit', 'AnnouncementRecoversController@submit');

    //终结公告
    $router->get('zjgg/edit/{project_id}', 'AnnouncementEndsController@edit');
    $router->get('zjgg/show/{project_id}', 'AnnouncementEndsController@show');
    $router->get('zjgg/approval/{project_id}', 'AnnouncementEndsController@approval');
    $router->post('zjgg/submit', 'AnnouncementEndsController@submit');

    //延期公告
    $router->get('zjgg/edit/{project_id}', 'AnnouncementDelaysController@edit');
    $router->get('zjgg/show/{project_id}', 'AnnouncementDelaysController@show');
    $router->get('zjgg/approval/{project_id}', 'AnnouncementDelaysController@approval');
    $router->post('zjgg/submit', 'AnnouncementDelaysController@submit');

    //变更公告
    $router->get('zjgg/edit/{project_id}', 'AnnouncementChangesController@edit');
    $router->get('zjgg/show/{project_id}', 'AnnouncementChangesController@show');
    $router->get('zjgg/approval/{project_id}', 'AnnouncementChangesController@approval');
    $router->post('zjgg/submit', 'AnnouncementChangesController@submit');

    //公告--通用
    $router->get('gg/edit/{type}/{project_id}', 'AnnouncementsController@edit');
    $router->get('gg/show/{type}/{project_id}', 'AnnouncementsController@show');
    $router->post('gg/insert', 'AnnouncementsController@insert');
    $router->post('gg/update', 'AnnouncementsController@modify');

    //流标公告
    $router->get('lbgg/edit/{project_id}', 'AnnouncementfailsController@edit');
    $router->get('lbgg/show/{project_id}', 'AnnouncementfailsController@show');
    $router->get('lbgg/approval/{project_id}', 'AnnouncementfailsController@approval');
    $router->post('lbgg/submit', 'AnnouncementfailsController@submit');


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
    $router->get('jgpt/qycg/sendGp/{id}', 'JgptProjectPurchasesController@sendGp');
    $router->get('jgpt/qycg/sendZbNotice/{id}', 'JgptProjectPurchasesController@sendZbNotice');
    $router->get('jgpt/qycg/sendPbResult/{id}', 'JgptProjectPurchasesController@sendPbResult');
    
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

    //客户信息
    $router->get('customer', 'CustomersController@index')->name('customer.index');
    $router->get('customer/create', 'CustomersController@create');
    $router->get('customer/{id}', 'CustomersController@show');
    $router->post('customer/insert', 'CustomersController@insert');
    $router->get('customer/{id}/edit', 'CustomersController@edit');
    $router->post('customer/modify', 'CustomersController@modify');
    $router->post('customer/search', 'CustomersController@search');
    $router->post('customer/search/member', 'CustomersController@search_member');

    $router->get('report/show', 'ReportController@show');

});
