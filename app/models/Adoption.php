<?php

    class Adoption {


        public function __construct(){



            $this->db = new Database();

        }

        public function checkEmail(){

        }

        /*public function checkAnimalId(){

        }*/

        public function adopt($data){

            $params = [

                'idAnimalAd' => $data['idAnimal'],
                'dataSolAd' => $data['dataSolicitacao'],
                'emailAd' => $data['email'],
                'cpfAd' => $data['cpf'],
                'declaracaoAd' => $data['declaracao'],
                'nomeAd' => $data['nome']

            ];

            $stmt = $this->db->execute("INSERT INTO adocao (idAnimal, dataSolicitacao, email, cpf, declaracao, nomeAdotante) VALUES (:idAnimalAd, :dataSolAd, :emailAd, :cpfAd, :declaracaoAd, :nomeAd)", $params);

            if($stmt){
                return TRUE;
            }
            return FALSE;


        }

        public function getAdoptions($pageNumber){


            $resultspp = RESULTS_PER_PAGE;

            $begin = ($pageNumber - 1) * $resultspp;

            $params = [

                $begin,
                $resultspp

            ];

            $results = $this->db->resultSet("SELECT * FROM adocao ORDER BY idAdocao DESC LIMIT ?,?", $params);

            return $results;




        }

        public function countAllAdoptions(){

            $result = $this->db->result("SELECT COUNT(*) AS contagem FROM adocao", []);

            return $result;

        }

        

        



    }



?>