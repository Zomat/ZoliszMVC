<?php
namespace ZoliszMVC\Core;
use ZoliszMVC\Controllers;

class Router{

    function __construct(){
        $this->request = $_SERVER['REQUEST_URI'];
        $this->request = trim($this->request ,'/');
        $this->params = explode('/', $this->request);
        if(empty($this->params[0])){ $this->params[0] = 'Index'; };
        
        
        foreach($this->params as $key => $param){
            if(!preg_match("/^[a-zA-Z0-9]+$/", $param)){
                unset($this->params[$key]);
            }
        }

        switch(ucfirst($this->params[0])){
            case 'Index': 
                $this->controller = 'Index';
                break;
            case 'ExamplePage': 
                $this->controller = 'ExamplePage';
                break;
                    
            default:
                unset($this->controller);
        }

        if(isset($this->controller)){
            $file = '../app/controllers/' . $this->controller . '.php';
            if(file_exists($file)){
                require_once $file;
                $namespace =  'ZoliszMVC\Controllers\\' . $this->controller;
                $this->control = new $namespace($this->params);
            }else{
                $flag = 'error';
            }
        }else{
            $flag = 'error';
        }

        if(isset($flag) && $flag == 'error'){
            http_response_code(404);
            require_once '../app/views/Error404.php';
        }
    }
    
}