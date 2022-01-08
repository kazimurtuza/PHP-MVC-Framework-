<?php

require_once __DIR__.'/vendor/autoload.php';
use app\core\Application;
$app=new Application();

$app->router->get('/',function(){
    echo  "hellow world";
});
$app->router->get('/contact','contact');
$app->router->get('/home','home');

 $app->run();
// $app->routerarray();






