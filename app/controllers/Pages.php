<?php


    class Pages extends Controller{

        public function __construct(){
            
        }

        public function index(){

            ///////echo "Gerenciamento de Animais";
            $this->view('pages/index', []);

        }

        public function about(){

            $this->view('pages/about', []);

        }

        public function doacoes(){

            $this->view('pages/doacoes', []);
        }

        




    }



?>