<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->get('projectpurchases', 'ProjectPurchasesController@index')->name('projectpurchase.index');
    $router->get('projectpurchases/create', 'ProjectPurchasesController@create');
    $router->post('projectpurchases', 'ProjectPurchasesController@add');
    $router->get('projectpurchases/{id}/edit', 'ProjectPurchasesController@edit');
    // $router->put('projectpurchases/{id}', 'ProjectPurchasesController@update');
    $router->post('projectpurchases/update', 'ProjectPurchasesController@update');
    $router->get('projectpurchases/{id}', 'ProjectPurchasesController@show');
    $router->post('projectpurchases/submit/{id}', 'ProjectPurchasesController@submit');
    $router->get('projectpurchases/showzp/{id}', 'ProjectPurchasesController@showzp');
    $router->post('projectpurchases/zp/{id}', 'ProjectPurchasesController@zp');
    $router->get('projectpurchases/editpb/{id}', 'ProjectPurchasesController@editpb');
    $router->post('projectpurchases/pb/{id}', 'ProjectPurchasesController@pb');
    $router->get('projectpurchases/copy/{id}', 'ProjectPurchasesController@copy');
    

    $router->get('projectleases', 'ProjectLeasesController@index')->name('projectleases.index');
    $router->get('projectleases/create', 'ProjectLeasesController@create');
    $router->post('projectleases', 'ProjectLeasesController@add');
    $router->get('projectleases/{id}/edit', 'ProjectLeasesController@edit');
    // $router->put('projectleases/{id}', 'ProjectLeasesController@update');
    $router->post('projectleases/update', 'ProjectLeasesController@update');
    $router->get('projectleases/{id}', 'ProjectLeasesController@show');
    $router->post('projectleases/submit/{id}', 'ProjectLeasesController@submit');
    $router->get('projectleases/showzp/{id}', 'ProjectLeasesController@showzp');
    $router->post('projectleases/zp/{id}', 'ProjectLeasesController@zp');
    $router->get('projectleases/editjj/{id}', 'ProjectLeasesController@editjj');
    $router->post('projectleases/jj/{id}', 'ProjectLeasesController@jj');
    $router->get('projectleases/copy/{id}', 'ProjectLeasesController@copy');
    
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
    $router->get('projects/showapproval/{id}', 'ProjectsController@showapproval');
    $router->post('projects/approval/{id}', 'ProjectsController@approval');

    $router->get('jgptprojectpurchases', 'JgptProjectPurchasesController@index')->name('jgptprojectpurchases.index');
    $router->get('jgptprojectpurchases/create', 'JgptProjectPurchasesController@create');
    $router->post('jgptprojectpurchases', 'JgptProjectPurchasesController@store');
    $router->get('jgptprojectpurchases/{id}/edit', 'JgptProjectPurchasesController@edit');
    $router->put('jgptprojectpurchases/{id}', 'JgptProjectPurchasesController@receive');
    $router->get('jgptprojectpurchases/{id}', 'JgptProjectPurchasesController@show');
    // $router->put('jgptprojectpurchases/{id}', 'JgptProjectPurchasesController@back');

    $router->get('jgptprojectleases', 'JgptProjectLeasesController@index')->name('jgptprojectleases.index');
    $router->get('jgptprojectleases/create', 'JgptProjectLeasesController@create');
    $router->post('jgptprojectleases', 'JgptProjectLeasesController@store');
    $router->get('jgptprojectleases/{id}/edit', 'JgptProjectLeasesController@edit');
    $router->put('jgptprojectleases/{id}', 'JgptProjectLeasesController@update');
    $router->get('jgptprojectleases/{id}', 'JgptProjectLeasesController@show');

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
    $router->post('suspends/{id}', 'SuspendsController@update');
    $router->get('suspends/{id}', 'SuspendsController@show');    
    $router->post('suspends/add', 'SuspendsController@add');
    $router->get('suspends/pause/{id}', 'SuspendsController@pause');
    $router->get('suspends/end/{id}', 'SuspendsController@end');  
});
