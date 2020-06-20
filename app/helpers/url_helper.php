<?php

    function redirect($page){

        header('location: '.URLROOT.'/'.$page);

    }

    function throwError404(){
        http_response_code(404);
        require_once("../app/views/errors/404.php");
        //die();
    }



?>