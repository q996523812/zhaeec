<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->get('qycg', 'ProjectPurchasesController@index')->name('qycg.index');
    $router->get('qycg/create', 'ProjectPurchasesController@create');
    $router->post('qycg', 'ProjectPurchasesController@insert');
    $router->get('qycg/{id}/edit', 'ProjectPurchasesController@edit');
    // $router->put('qycg/{id}', 'ProjectPurchasesController@update');
    $router->post('qycg/update', 'ProjectPurchasesController@modify');
    $router->get('qycg/{id}', 'ProjectPurchasesController@show');
    $router->post('qycg/submit', 'ProjectPurchasesController@submit');
    $router->get('qycg/showzp/{id}', 'ProjectPurchasesController@showzp');
    $router->post('qycg/zp/{id}', 'ProjectPurchasesController@zp');
    $router->get('qycg/editpb/{id}', 'ProjectPurchasesController@editpb');
    $router->post('qycg/pb/{id}', 'ProjectPurchasesController@pb');
    $router->get('qycg/copy/{id}', 'ProjectPurchasesController@copy');
    $router->get('qycg/manage/{id}', 'ProjectPurchasesController@manage');
    $router->get('qycg/print/{id}', 'ProjectPurchasesController@print');
    

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

    $router->get('projects', 'ProjectsController@index')->name('projects.index');
    // $router->get('projects/create', 'ProjectsController@create');
    // $router->post('projects', 'ProjectsController@add');
    $router->get('projects/{id}/edit', 'ProjectsController@edit');
    $router->get('projects/{id}', 'ProjectsController@show');
    $router->get('projects/showapproval/{id}', 'ProjectsController@showapproval');
    $router->post('projects/approval/{id}', 'ProjectsController@approval');

    $router->get('jgpt/qycg', 'JgptProjectPurchasesController@index')->name('jgpt.qycg.index');
    $router->get('jgpt/qycg/{id}', 'JgptProjectPurchasesController@show');
    $router->get('jgpt/qycg/edit/{id}', 'JgptProjectPurchasesController@edit');
    $router->post('jgpt/qycg/receive', 'JgptProjectPurchasesController@receive');
    
    // $router->put('jgptprojectpurchases/{id}', 'JgptProjectPurchasesController@back');

    $router->get('jgpt/zczl', 'JgptProjectLeasesController@index')->name('jgpt.zczl.index');
    $router->get('jgpt/zczl/create', 'JgptProjectLeasesController@create');
    $router->post('jgpt/zczl', 'JgptProjectLeasesController@store');
    $router->get('jgpt/zczl/edit/{id}', 'JgptProjectLeasesController@edit');
    $router->put('jgpt/zczl/{id}', 'JgptProjectLeasesController@update');
    $router->get('jgpt/zczl/{id}', 'JgptProjectLeasesController@show');
    $router->post('jgpt/zczl/receive', 'JgptProjectLeasesController@receive');
    $router->get('jgpt/zczl/sendGp/{id}', 'JgptProjectLeasesController@sendGp');
    $router->get('jgpt/zczl/sendZbNotice/{id}', 'JgptProjectLeasesController@sendZbNotice');

    $router->get('pbresults', 'PbResultsController@index')->name('pbresults.index');
    $router->get('pbresults/create', 'PbResultsController@create');
    $router->post('pbresults', 'PbResultsController@store');
    $router->get('pbresults/{id}/edit', 'PbResultsController@edit');
    $router->put('pbresults/{id}', 'PbResultsController@update');
    $router->get('pbresults/{id}', 'PbResultsController@show');
    $router->post('pbresults/insert', 'PbResultsController@insert');

    $router->get('winnotices', 'WinNoticesController@index')->name('winnotices.index');
    $router->get('winnotices/create', 'WinNoticesController@create');
    $router->post('winnotices', 'WinNoticesController@store');
    $router->get('winnotices/{id}/edit', 'WinNoticesController@edit');
    $router->put('winnotices/{id}', 'WinNoticesController@update');
    $router->get('winnotices/{id}', 'WinNoticesController@show');
    $router->get('winnotices/insert/{project_id}', 'WinNoticesController@insert');
    $router->post('winnotices/add', 'WinNoticesController@add');

    $router->post('images/store', 'ImagesController@store');
    $router->post('images/destroy', 'ImagesController@destroy');    
    $router->post('files/store', 'FilesController@store');
    $router->post('files/destroy', 'FilesController@destroy');

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

    $router->get('yxdj', 'IntentionalPartiesController@index')->name('yxdj.index');
    $router->get('yxdj/create/{project_id}', 'IntentionalPartiesController@create');
    $router->get('yxdj/edit/{id}', 'IntentionalPartiesController@edit');   
    $router->get('yxdj/{id}', 'IntentionalPartiesController@show');    
    $router->post('yxdj/add', 'IntentionalPartiesController@add');
    $router->post('yxdj/update', 'IntentionalPartiesController@update');
    $router->post('yxdj/submit/', 'IntentionalPartiesController@submit');
    $router->get('yxdj/showapproval/{id}', 'IntentionalPartiesController@showapproval');
    $router->post('yxdj/approval/{id}', 'IntentionalPartiesController@approval');
    $router->get('yxdj/showconfirm/{id}', 'IntentionalPartiesController@showconfirm');
    $router->post('yxdj/confirm/{id}', 'IntentionalPartiesController@confirm');

});
