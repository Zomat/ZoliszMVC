<?php
class Router{

    function __construct(){
        $this->request = $_SERVER['REQUEST_URI'];
        $this->request = trim($this->request ,'/');
        $this->params = explode('/', $this->request);
        if(empty($this->params[0])){ $this->params[0] = 'Index'; };
        $this->controller = ucfirst($this->params[0]);
        
        foreach($this->params as $key => $param){
            if(!preg_match("/^[a-zA-Z0-9]+$/", $param)){
                unset($this->params[$key]);
            }
        }

        $file = '../app/controllers/' . $this->controller . '.php';
        if(file_exists($file) && isset($this->params[0])){
            require_once $file;
            $this->control = new $this->controller($this->params);
        }else{
            http_response_code(404);
            require_once '../app/views/Error404.php';
        }
    }
    
}