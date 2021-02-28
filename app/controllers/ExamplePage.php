<?php
class ExamplePage extends Controller{

    function __construct($params){
        parent::__construct();
        $this->view->controller = get_class($this);
        $this->view->page = "Example";

        require_once '../app/models/' . get_class($this) . '_model.php';
        $this->modelName = get_class($this) . '_model';
        $this->model = new $this->modelName();

        isset($params[1]) ? $title = $params[1] : $title = 'ExampleTitle';

        $this->exampleAction($title);
    }

    private function exampleAction($title){
        $this->view->title = $title;
        $this->view->selectedFromDB = $this->model->exampleMethod();
        $this->view->render();
    }
}