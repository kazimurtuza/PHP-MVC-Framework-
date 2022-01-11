<?php
namespace app\core;
class Response{

    public function SetStatusCode(int $code){
        http_response_code($code);

    }

}

