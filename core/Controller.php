<?php
namespace BWB\CORE;

abstract class Controller {

    //Proprietes correspondantes aux superglobales $_post et $_get
    protected $post;
    protected $get;

    function __construct() {

        $this->post = $_POST;
        $this->get = $_GET;

    }

    //Include du code dans une view
    final protected function render($viewPath,$data = null){

        foreach ($data as $key => $value) {
            $$key = $value;
        }
        include "./views/".$viewPath.".php";
    }
    
}