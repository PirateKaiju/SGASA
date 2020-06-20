<?php

    class User{

        private $db;

        public function __construct(){

            $this->db = new Database();


        }


        public function register($data){

            //Inserts user to DB from data

            //$params = $array($data['nome'], $data['email'], $data[]);
            $params = array(
                'nomeUsr' => $data['nome'],
                'cpfUsr' => $data['cpf'],
                'idadeUsr' => $data['idade'],
                'emailUsr' => $data['email'],
                'senhaUsr' => $data['senha'],
                'cargoUsr' => $data['cargo'],

            );

            $stmt = $this->db->execute("INSERT INTO usuario (nome, cpf, idade, email, senha, cargo) VALUES (:nomeUsr, :cpfUsr, :idadeUsr, :emailUsr, :senhaUsr, :cargoUsr)", $params);

            //$stmt = $this->db->execute("INSERT INTO usuario (nome, cpf, idade, email, senha, cargo) VALUES (:nome, :cpf, :idade, :email, :senha, :cargo)", $data);

            //$stmt = $this->db->execute('INSERT INTO usuario (nome, cpf, idade, email, senha, cargo) VALUES ("aaa", "111", 11 , "hhh@mail.com", "222222", "usr")', []);//TEST ONLY
            //TEST INSERTION WORKS, CHECK PARAMETERS LATER ^^
            //Checks for success

            if($stmt){
                return TRUE;
            }

            return FALSE;


        }

        public function updateUser($data){

            $params = array(
                'idUsr' => $data['id'],
                'nomeUsr' => $data['nome'],
                'cpfUsr' => $data['cpf'],
                'idadeUsr' => $data['idade'],
                'emailUsr' => $data['email'],
                'senhaUsr' => $data['senha']

            );

            $stmt = $this->db->execute("UPDATE usuario SET nome = :nomeUsr, cpf = :cpfUsr, idade = :idadeUsr, email = :emailUsr, senha = :senhaUsr WHERE id = :idUsr", $params);


            if($stmt){
                return TRUE;
            }

            return FALSE;



        }

        
        public function login($email, $senha){

            //Checks if passed data matches a loggable user in database

            $data = array('email' => $email);

            //Retrieving matching user from database by email
            $result = $this->db->result('SELECT * FROM usuario WHERE email = :email', $data);

            //var_dump($result);
            //Password checking
            $hashed_password = $result->senha;

            if(password_verify($senha, $hashed_password)){
                //If the password is valid, returns the retrieved data
                return $result;
            }

            return FALSE;

        }

        public function countAllUsers(){

            $result = $this->db->result("SELECT COUNT(*) AS contagem FROM usuario", []);

            return $result;


        }

        public function getUsers($pageNumber){

            $resultspp = RESULTS_PER_PAGE;

            $begin = ($pageNumber - 1) * $pageNumber;
            
            $params = [
                $begin,
                $resultspp
            ];


            $result = $this->db->resultSet("SELECT * FROM usuario ORDER BY id DESC LIMIT ?, ? ", $params);

            return $result;



        }

        public function getUserById($id){


            $params = [
                'idUsr' => $id
            ];

            $result = $this->db->result("SELECT * FROM usuario WHERE id = :idUsr", $params);

            return $result;


        }

        public function getUserByEmail($email){

            $params = [
                'emailUsr' => $email
            ];

            $result = $this->db->result("SELECT * FROM usuario WHERE email = :emailUsr", $params);

            return $result;

        }

        public function emailExists($email){

            if($this->getUserByEmail($email)){
                return TRUE;
            }

            return FALSE;


        }

        //TODO: CAROUSEL
        //TODO: CSRF
        //TODO: IMAGENS
        //TODO: SOLICITACOES ADOCAO



    }

?>