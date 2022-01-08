<?php
namespace app\core;
class Router{
     public Request $request;
    public array $routes=[];
    public function __construct($request)
    {
        $this->request=$request;
    }

    public function get($path,$callback){
        $this->routes['get'][$path]=$callback;

    }
    public function resolve(){
    $path=$this->request->getPath();
    $method=$this->request->getMethod();
    $callback=$this->routes[$method][$path]??false;
    if($callback===false){
     echo "page not found ";
     exit;
    }
    if(is_string($callback)){
        return $this->renderView($callback);
    }

      return call_user_func($callback);

  
    }

    public function renderView($view){
        $layoutcontent=$this->layoutContent();
        $viewContetn=$this->renderOnlyView($view);
        return str_replace('{{content}}',$viewContetn,$layoutcontent);


    }
    public function layoutContent(){
         ob_start();
        require_once __DIR__."./../views/laouts/mail.php";
        return ob_get_clean();

    }

    public function renderOnlyView($view){
        ob_start();
       require_once __DIR__."./../views/$view.php";
        return ob_get_clean();

    }
  
    
}