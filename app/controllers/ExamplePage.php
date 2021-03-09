<?php
namespace ZoliszMVC\Controllers;
use ZoliszMVC\Core\Controller as Controller;
use ZoliszMVC\Models;

class ExamplePage extends Controller{

    function __construct($params){
        parent::__construct();
        $name = 'ExamplePage';
        $this->view->controller = 'ExamplePage';
        $this->view->page = 'Example';

        require_once '../app/models/' . $name . '_model.php';
        $this->modelName =  $name . '_model';
        $namespace = 'ZoliszMVC\Models\\' . $this->modelName;
        $this->model = new $namespace();

        $this->exampleAction('ExampleAction');
    }

    private function exampleAction($title){
        $this->view->title = $title;
        $this->view->render();
    }
}