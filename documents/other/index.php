<?php

spl_autoload_register(function($class_name){

    if(file_exists("./Controller/".$class_name.".php")){

        include_once("./Controller/".$class_name.".php");

    }else if(file_exists("./Model/".$class_name.".php")){

        include_once("./Model/".$class_name.".php");

    }




});

require_once("");

?>