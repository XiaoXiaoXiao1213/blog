<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('users',UserController::class);
    $router->resource('application',Application_registrationController::class);
    $router->resource('bclassification',bclassificationController::class);
    $router->resource('connection',connectionController::class);
    $router->resource('Cooperation',Cooperation_informController::class);
    $router->resource('cuttingedge',cuttingedgeController::class);
    $router->resource('eatmedicine',eatmedicineController::class);
    $router->resource('Goods_details',Goods_detailsController::class);
    $router->resource('Goods',GoodsController::class);
    $router->resource('lastapplication',lastapplicationController::class);
    $router->resource('notice',noticeController::class);
    $router->resource('sclassification',sclassificationController::class);
    $router->resource('semmar',semmarController::class);
    $router->resource('Technical_consulting',Technical_consultingController::class);

});

