<?php
namespace ZoliszMVC\Models;
use ZoliszMVC\Core\Model as Model;

class Index_model extends Model{
    function __construct(){
        parent::__construct();
    }

    public function exampleMethod(){
        return 'Simple MVC framework created by Mateusz Zolisz';
    }
}