<?php

namespace app\core;
use app\core\Application;

class Controller{
    public string $layout="main";
    public function render($view,$param=[]){
        return Application::$app->router->renderView($view,$param);
    }
    public function setLayout($layout){
        return $this->layout=$layout;
    }

}
?>