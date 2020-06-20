<?php

    class Errors extends Controller{
       
        public function error404(){
            $this->view("errors/404.php", []);
        }
        
    }



?>