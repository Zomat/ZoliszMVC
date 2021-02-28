<?php
class View{

    public function render(){
        require_once '../app/views/Header.php';

        if(isset($this->controller) && isset($this->page)){
            $file = '../app/views/' . $this->controller . '/' . $this->page . '.php';
            if(file_exists($file)){
                require_once $file;
            }else{
                $this->message = "404 not found";
                require_once '../app/views/Error404.php';
            }
        }

        require_once '../app/views/Footer.php';
    }

}