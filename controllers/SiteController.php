<?php 
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller {

    public  function handleController(Request $request){
        echo '<pre>';
        var_dump($request->getBody()['email']);
        echo '</pre>';

          
        // var_dump(Application::$app->request->getBody());
       return "handelling submited data";
    }
    public  function contact(){
      
        return $this->render('contact');
    }
    public  function hellow($name){
        return $name;
    }
    public  function home(){
        $paramiter=[
            "name"=>'murtuza',
        ];
        return $this->render('home',$paramiter);
    }
 

}



?>