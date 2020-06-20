<?php

    class Rescues extends Controller{
        
        public function __construct(){




            $this->rescueModel = $this->model('Rescue');
        }


        public function index($pageNumber = 1){

            if(!userIsLoggedIn()){

                redirect('users/login');
            }

            //For registered users only

            //Pagination here

            $solicitacoes = $this->rescueModel->getBuscas($pageNumber);

            $data = [
                'solicitacoes' => $solicitacoes,
                'pageNumber' => $pageNumber
            ];

            $this->view('rescues/index', $data);

        }

        public function register(){
            
            

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'cpf' => trim($_POST['cpf']),
                    'descricao' => trim($_POST['descricao']),
                    'dataSolicitaBusca' => date("Y/m/d"),
                    'cpf_err' => '',
                    'descricao_err' => '',
                    'datasol_err' => ''
                ];

                if(empty($data['cpf'])){
                    $data['cpf_err'] = 'Favor inserir um CPF valido';
                }elseif(strlen($data['cpf']) > 15){
                    $data['cpf_err'] = 'Limite de caracteres do CPF atingido. Verifique erros de digitação.';
                }

                if(empty($data['descricao'])){
                    $data['descricao_err'] = 'Favor inserir os detalhes da busca, incluindo o endereço';
                }

                if(empty($data['dataSolicitaBusca'])){
                    //From webserver

                    $data['datasol_err'] = 'Erro ao processar a data da solicitação';

                }

                if(empty($data['cpf_err']) && empty($data['descricao_err']) && empty($data['datasol_err'])){

                    if($this->rescueModel->register($data)){

                        flash("msg_rescues", "Solicitação de resgate registrada.");

                        redirect('rescues/about');

                    }else{

                        die("Algum erro ocorreu. Manutenção reportada.");
                    }

                }else{

                    $this->view('rescues/register', $data);
                }

            }else{

                //Inserts date 

                $data = [
                    'cpf' => '',
                    'descricao' => '',
                    'dataSolicitaBusca' => ''
                ];


                $this->view('rescues/register', $data);


            }

        }

        public function delete($id){
            
        }




    }


?>