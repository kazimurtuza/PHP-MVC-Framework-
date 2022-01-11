<?php
namespace app\core;
class Router{
     public Request $request;
     public Response $response;
     public array $routes=[];

    public function __construct($request,Response $response)
    {
        $this->request=$request;
        $this->response=$response;
    }

    public function get($path,$callback){
        $this->routes['get'][$path]=$callback;
    }
    public function post($path,$callback){
        $this->routes['post'][$path]=$callback;

    }
    public function resolve(){
    $path=$this->request->getPath();
    $method=$this->request->method();
    $callback=$this->routes[$method][$path]??false;
    if($callback===false){
        $this->response->SetStatusCode(404);
     return $this->renderView("_404");

    }
    if(is_string($callback)){
        return $this->renderView($callback);
    }
    if(is_array($callback)){
    //     echo '<pre>';
    // var_dump(Application::$app->controller);
    // echo '</pre>';
    
      Application::$app->controller=new $callback[0]();
    $callback[0]=Application::$app->controller;
    }
      
      return call_user_func($callback,$this->request);
    }

    public function renderView($view,$param=[]){
        $layoutcontent=$this->layoutContent();
        $viewContetn=$this->renderOnlyView($view,$param);
        return str_replace('{{content}}',$viewContetn,$layoutcontent);
    }

    public function renderContent($viewContent){
        $layoutcontent=$this->layoutContent();
        $viewContetn=$viewContent;
        return str_replace('{{content}}',$viewContetn,$layoutcontent);
    }


    public function layoutContent(){
        $layout=Application::$app->controller->layout;
         ob_start();
        require_once __DIR__."./../views/laouts/$layout.php";
        return ob_get_clean();

    }

    public function renderOnlyView($view,$param){
        foreach($param as $key=>$value){
            $$key=$value;
        }
        ob_start();
       require_once __DIR__."./../views/$view.php";
        return ob_get_clean();
    }
  
    
}