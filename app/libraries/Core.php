<?php
    //APP CORE CLASS

    class Core{


        //If no other controller is presented at url, then this is used
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){

            //Uses getUrl to split actual URL as array, containing the controller and method to be called
            $url = $this->getUrl();

            //The first item of array is the name of a controller 
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                
                $this->currentController = ucwords($url[0]);
                
                //Unsets for future parameter grouping 
                unset($url[0]);

            }

            //Makes controller available on current scope
            require_once '../app/controllers/'.$this->currentController.'.php';

            $this->currentController = new $this->currentController;

            //Checks if a method has been passed
            if(isset($url[1])){
                
                //Checks if a method is valid for given controller
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }

            }

            //The remainder of the array composed of parameters

            $this->params = $url ? array_values($url) : [];

            //Calls the actual controller
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);



        }


        public function getUrl(){

            //Returns the current passed URL as array
            if(isset($_GET['url'])){

                $url = rtrim($_GET['url'], '/');

                $url = filter_var($url, FILTER_SANITIZE_STRING);

                $url = explode('/', $url);

                return $url;

            }
        }





    }


?>