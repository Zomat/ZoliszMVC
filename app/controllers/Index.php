<?php
class Index extends Controller{

    function __construct($params){
        parent::__construct();
        $this->view->controller = get_class($this);
        $this->view->page = "Home";

        require_once '../app/models/' . get_class($this) . '_model.php';
        $this->modelName = get_class($this) . '_model';
        $this->model = new $this->modelName();

        $this->exampleAction('ZoliszMVC');
    }

    private function exampleAction($title){
        $this->view->title = $title;
        $this->view->subtitle = $this->model->exampleMethod();
        $this->view->render();
    }
}