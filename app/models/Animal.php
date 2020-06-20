<?php

    class Animal{

        public function __construct(){

            $this->db = new Database();

        }


        public function register($data){
            //Inserts animal to database from data

            //var_dump($data);

            $params = [
                'nomeAn' => $data['nome'],
                'idadeAn' => $data['idade'],
                'statusAn' => $data['statusAnimal'],
                'datarecAn' => $data['datarecolhimento'],
                'especieAn' => $data['especie'],
                'descricaoAn' => $data['descricao']

            ];

            $stmt = $this->db->execute('INSERT INTO animal (nome, idade, statusAnimal, datarecolhimento, especie, descricao) VALUES (:nomeAn, :idadeAn, :statusAn, :datarecAn, :especieAn, :descricaoAn)', $params);

            //echo('pass register');

            if($stmt){
                return TRUE;
            }

            return FALSE;

        }


        public function updateAnimal($data){
            //Inserts animal to database from data

            //var_dump($data);

            $params = [
                'idAn' => $data['id'],
                'nomeAn' => $data['nome'],
                'idadeAn' => $data['idade'],
                'statusAn' => $data['statusAnimal'],
                'datarecAn' => $data['datarecolhimento'],
                'especieAn' => $data['especie'],
                'descricaoAn' => $data['descricao']

            ];

            $stmt = $this->db->execute("UPDATE animal SET nome = :nomeAn, idade = :idadeAn, status_animal = :statusAn, datarecolhimento = :datarecAn, especie = :especieAn, descricao = :descricaoAn WHERE idAnimal = :idAn", $params);

            //echo('pass register');

            if($stmt){
                return TRUE;
            }

            return FALSE;

        }

        public function  getAnimals($pageNumber){
            //All animals from db in a page interval
            $resultspp = RESULTS_PER_PAGE;
            
            //Interval limits calculation
            $begin = ($pageNumber - 1) * $resultspp;
            
            $params = [
                $begin,
                $resultspp
            ];

            //Limits applied
            //Using ORDER BY to show newest first, might change later
            $result = $this->db->resultSet("SELECT * FROM animal ORDER BY idAnimal DESC LIMIT ?, ?", $params);

            return $result;

        }

        public function getAllAnimals(){
            //All animals from db

            $result = $this->db->resultSet("SELECT * FROM animal ORDER BY idAnimal");

            return $result;

        }

        public function getAnimalById($id){

            $params = [
                'id' => $id
            ];

            $result = $this->db->result("SELECT * FROM animal WHERE idAnimal = :id", $params);

            return $result;

        }

        public function getAdoptablePaged($pageNumber){

            //TODO: Change it to only adoptable animals

            $resultspp = RESULTS_PER_PAGE;
            
            //Interval limits calculation
            $begin = ($pageNumber - 1) * $resultspp;
            
            $params = [
                $begin,
                $resultspp
            ];

            //Limits applied
            //Using ORDER BY to show newest first, might change later
            $result = $this->db->resultSet("SELECT * FROM animal ORDER BY idAnimal DESC LIMIT ?, ?", $params);

            return $result;


        }

        public function countAllAnimals(){

            $result = $this->db->result("SELECT COUNT(*) AS contagem FROM animal", []);

            return $result;

        }

        public function countAllAdoptable(){

            //TODO: Change it to only adoptable animals

            $result = $this->db->result("SELECT COUNT(*) AS contagem FROM animal", []);

            return $result;

        }

        public function deleteById($id){



            $params = [
                'id' => $id
            ];

            $stmt = $this->db->execute("DELETE FROM animal WHERE idAnimal = :id", $params);

            if($stmt){
                return TRUE;
            }
            return FALSE;

        }

        public function report($data){

            //testPDF();

            $pdf = startPDF();
            $pdf->SetFont('Arial','',12);

            $pdf->AddPage();
            //Test for optionals


            //Main content
            if($data['tipoRelatorio'] == 'basico'){

                

            }else if($data['tipoRelatorio'] == 'resumido'){

                $result = $this->getAllAnimals();

                foreach($result as $animal){

                    $formattedText = "";
                    $formattedText .= $animal->nome . " - ";
                    $formattedText .= "Data de Recolhimento: ". $animal->datarecolhimento."\n";
                   

                    $pdf->MultiCell(0,5, $formattedText);
                    $pdf->Ln(10);
                }

            }else{


                $result = $this->getAllAnimals();

                foreach($result as $animal){

                    $formattedText = "";
                    $formattedText .= $animal->nome . " - ";
                    $formattedText .= "Idade: ". $animal->idade . " Data de Recolhimento: ". $animal->datarecolhimento."\n";
                    $formattedText .= "Detalhes: ".$animal->descricao."\n";

                    $pdf->MultiCell(0,5, $formattedText);
                    $pdf->Ln(10);
                }




            }

            //Flush all data
            $pdf->Output();

        }





        
    }


?>