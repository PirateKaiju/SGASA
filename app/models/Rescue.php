<?php

    class Rescue {


        public function __construct(){

            $this->db = new Database();
            
        }

        public function register($data){

            $params = [
            
                'cpfReg' => $data['cpf'],
                'descricaoReg' => $data['descricao'],
                'dataReg' => $data['dataSolicitaBusca']
            
            ];

            $stmt = $this->db->execute("INSERT INTO busca (cpf, descricao, dataSolicitaBusca) VALUES (:cpfReg, :descricaoReg, :dataReg)", $params);

            if($stmt){

                return TRUE;
            }

            return FALSE;


        }

        public function getBuscas($pageNumber){

            $result = $this->db->resultSet("SELECT * FROM busca", []);

            return $result;


        }



    }

?>