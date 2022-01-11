<?php

require_once __DIR__.'/vendor/autoload.php';



use app\controllers\AuthController;
use app\core\Application;
use app\controllers\SiteController;
$app=new Application();

$app->router->get('/',function(){
    echo  "hellow world";
});
$app->router->get('/home',[SiteController::class,'home']);
$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->post('/contact',[SiteController::class,'handleController']);
$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/register',[AuthController::class,'register']);
$app->router->get('/register',[AuthController::class,'register']);




 $app->run();
// $app->routerarray();






