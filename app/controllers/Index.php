<?php
namespace ZoliszMVC\Controllers;
use ZoliszMVC\Core\Controller as Controller;
use ZoliszMVC\Models;

class Index extends Controller{

    function __construct($params){
        parent::__construct();
        $name = 'Index';
        $this->view->controller = 'Index';
        $this->view->page = "Home";

        require_once '../app/models/' . $name . '_model.php';
        $this->modelName =  $name . '_model';
        $namespace = 'ZoliszMVC\Models\\' . $this->modelName;
        $this->model = new $namespace();

        $this->exampleAction('ZoliszMVC');
    }

    private function exampleAction($title){
        $this->view->title = $title;
        $this->view->subtitle = $this->model->exampleMethod();
        $this->view->render();
    }
}