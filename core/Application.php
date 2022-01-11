<?php
namespace app\core;

class Application{

        public Request $request;
        public Router $router;
        public static Application $app;
        public Response $response;
        public Controller $controller;
   

    public function __construct()
    {
        $this->request=new Request();
          $this->response=new Response();
        $this->router=new Router($this->request,$this->response);
      
        self::$app=$this;
    }

    public function getController(){
      return $this->controller;
  
    }
    public function setController(Controller $controller){
      $this->controller=$controller;

    }
    public function run(){
    echo $this->router->resolve();
    }

      public function routerarray(){
    
        // echo "<pre>";
        //  var_dump($this->router->routes);
        // echo "</pre>";
    }

}