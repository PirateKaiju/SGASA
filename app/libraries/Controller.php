<?php

//Base controller with methods for loading models and views

    class Controller{

        //Model loading
        public function model($model){

            require_once '../app/models/'.$model.'.php';

            return new $model();



        }

        
        //View loading
        public function view($view, $data = []){


            //$data is put in the same context

            if(file_exists('../app/views/'.$view.'.php')){

                require_once '../app/views/'.$view.'.php';
            }else{
                //die("Current view doesn't exist.");
                //error404();
                throwError404();
            }

        }


    }



?>