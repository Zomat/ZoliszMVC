<?php
    namespace ZoliszMVC; 
    require_once '../app/config.php';
    require_once '../app/Core/Router.php';
    require_once '../app/Core/Controller.php';
    require_once '../app/Core/Model.php';
    require_once '../app/Core/View.php';

    use ZoliszMVC\Controllers;
    use ZoliszMVC\Core\Router as Router;
    
    $router = new Router();
   
    