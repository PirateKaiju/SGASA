<?php
    class Database{
        //SINGLETON

        private static $instance = null;

        private $conn;

        private $db;

        protected function __construct(){
            try{

                $this->conn = new PDO($this->db);


            }catch(PDOException $e){

                echo $e->getMessage();

            }

        }

        public static function getInstance(){

            if($instance === null){

                self::$instance = new Database();


            }

            return(self::$instance);


        }

        public function getConnection(){


            return $this->conn;

        }


    }


    




?>