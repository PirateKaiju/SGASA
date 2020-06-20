<?php

    class Database{

        private $db_file = DB_FILE;
        private $conn = null;


        public function __construct(){


            //Creates a database connection to SQLITE 
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            try{

                $this->conn = new PDO($this->db_file, null, null, $options);

            }catch(PDOException $e){

                echo $e->getMessage();
            }
        }

        //One way queries
        public function execute($stmt, $params = []){

            $stmt = $this->conn->prepare($stmt);

            if($params){
                //var_dump($params); //TEST
                $stmt->execute($params);
                //var_dump($stmt); //TEST
            }else{
                $stmt->execute();
            }

            //var_dump($stmt->errorInfo());

            return $stmt;
        }

        //Queries that demand return
        public function result($stmt, $params = []){

            $stmt = $this->execute($stmt, $params);

            //Fetches as an object

            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        //Queries returning multiple rows 
        public function resultSet($stmt, $params = []){

            $stmt = $this->execute($stmt, $params);

            //Fetches as an array of objects
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

    }

?>