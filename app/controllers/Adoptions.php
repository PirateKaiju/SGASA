<?php


    class Adoptions extends Controller{

        public function __construct(){


            //Registering adoption model
            $this->adoptionModel = $this->model('Adoption');
            //Registering animal model
            $this->animalModel = $this->model('Animal');


        }

        //TODO: FINISH ADOPT

        public function adopt($idAnimal){

            //Register an adoption request

            //Check if animal exists

            if(!$this->animalModel->getAnimalById($idAnimal)){
                //redirect('animals/adoption');
                die("Erro: Acesso a recurso inexistente.");
            }

            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'idAnimal' => $idAnimal,
                    'nome' => trim($_POST['nome']),
                    'cpf' => trim($_POST['cpf']),
                    'email' => trim($_POST['email']),
                    'declaracao' => trim($_POST['declaracao']),
                    'dataSolicitacao' => date("Y/m/d"),
                    'nome_err' => '',
                    'cpf_err' => '',
                    'email_err' => ''

                ];

                if(empty($data['nome'])){
                    $data['nome_err'] = 'Favor entrar com seu nome';
                }

                if(empty($data['cpf'])){
                    $data['cpf_err'] = 'Favor entrar com seu CPF';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Favor entrar com seu email';
                }

                if(empty($data['nome_err']) && empty($data['cpf_err']) && empty($data['email_err'])){

                    //echo('Inserted');

                    if($this->adoptionModel->adopt($data)){
                        
                        //flash and redirect
                        

                        redirect('animals/adoption');

                    }else{
                        die("Algum erro ocorreu. Manutenção reportada.");
                    }

                }else{


                    $this->view('adoptions/adopt', $data);

                }



                

            }else{

                $data = [

                    'idAnimal' => $idAnimal,
                    'nome' => '',
                    'cpf' => '',
                    'email' => ''

                ];

                $this->view('adoptions/adopt', $data);


            }

            
        }

        public function index($pageNumber = 1){
            //Management users only

            //Show the adoption requests, paged

            if(!userIsLoggedIn()){

                redirect("users/login");

            }

            $totalItens = (int)$this->adoptionModel->countAllAdoptions()->contagem;
            $totalPages = calculateTotalPages($totalItens);

            if($pageNumber >= 1 && $pageNumber <= $totalPages){

                $adoptions = $this->adoptionModel->getAdoptions($pageNumber);

                //TODO: SEND ANIMAL DATA

                $data = [

                    'adoptions' => $adoptions,
                    'pageNumber' => $pageNumber,
                    'totalPages' => $totalPages

                ];

                $this->view('adoptions/index', $data);

            }else{

                die("Erro: Acesso a recurso inexistente");
            }





            
        }




    }



?>