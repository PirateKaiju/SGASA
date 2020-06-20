<?php

    class Users extends Controller{

        public function __construct(){



            //Registering the used model

            $this->userModel = $this->model('User');
        }


        public function index($pageNumber = 1){
            //User exhibition and management
            //Exclusive for Admin role
            if(!loggedUserIsAdmin()){
                redirect('pages/index');//Might change
            }

            $totalUsers = (int) $this->userModel->countAllUsers()->contagem;

            $totalPages = calculateTotalPages($totalUsers);

            if($pageNumber >= 1 && $pageNumber <= $totalPages){

                $users = $this->userModel->getUsers($pageNumber);

                $data = [
                    'users' => $users,
                    'pageNumber' => $pageNumber,
                    'totalPages' => $totalPages 
                ];

                $this->view("users/index", $data);

            }else{
                die("Erro: Acesso a recurso inexistente");
            }


        }


        public function register(){
            //Exclusive for Admin role

            if(!loggedUserIsAdmin()){
                redirect('pages/index');//Might change
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //Filtering for flaws
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Filling data array with post request and values for possible error messages
                //usr for cargo is standard (usr, adm)
                $data = [
                    'nome' => trim($_POST['nome']),
                    'cpf' => trim($_POST['cpf']),
                    'email' => trim($_POST['email']),
                    'idade' => trim($_POST['idade']),
                    'senha' => trim($_POST['senha']),
                    'conf_senha' => trim($_POST['conf_senha']),
                    'cargo' => '',
                    'nome_err' => '',
                    'cpf_err' => '',
                    'email_err' => '',
                    'idade_err' => '',
                    'senha_err' => '',
                    'conf_senha_err' => '',
                    
                ];

                //Validating input

                if(empty($data['nome'])){
                    $data['nome_err'] = 'Insira um nome válido';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Insira um email válido';
                }else if($this->userModel->emailExists($data['email'])){

                    $data['email_err'] = 'Insira um email válido';

                    //Manage case of already existant email
                }

                if(empty($data['cpf'])){
                    $data['cpf_err'] = 'Insira um CPF válido';
                }else if(strlen($data['cpf']) > 15){
                    $data['cpf_err'] = 'Limite de caracteres do CPF atingido. Verifique erros de digitação.';
                }

                if(empty($data['senha'])){
                    $data['senha_err'] = 'Preencha o campo senha';
                }else if(strlen($data['senha']) < 6){
                    $data['senha_err'] = 'Favor utilizar uma senha com 6 ou mais caracteres';
                }

                if($data['conf_senha'] != $data['senha']){
                    $data['conf_senha_err'] = "Confirmação incompatível";
                }

                if(empty($data['idade'])){
                    $data['idade_err'] = 'Insira uma idade válida';
                }

                //Checks if no error has ocurred
                if(empty($data['nome_err']) && empty($data['email_err']) && empty($data['cpf_err']) && empty($data['senha_err']) && empty($data['conf_senha_err']) && empty($data['idade_err'])){

                    //Hash the password
                    $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

                    //Set cargo
                    $data['cargo'] = 'usr';

                    //Use the model to insert to DB
                    if($this->userModel->register($data)){

                        //Redirect and flash a message
                        flash("msg_user", "Usuário registrado com sucesso");
                        redirect('users/index');

                    }else{

                        die("Algum erro ocorreu. Manutenção reportada.");
                    }


                }else{

                    //Shows appointed errors
                    $this->view('users/register', $data);
                }



            }else{

                $data = [
                    'nome' => '',
                    'cpf' => '',
                    'email' => '',
                    'idade' => '',
                    'senha' => '',
                    'conf_senha' => ''

                ];

                $this->view('users/register', $data);
            }


        }

        public function edit($id){
            if(!loggedUserIsAdmin()){
                redirect('pages/index');//Might change
            }

            $currentUser = $this->userModel->getUserById($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //Filtering for flaws
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Filling data array with post request and values for possible error messages
                //usr for cargo is standard (usr, adm)
                $data = [
                    'id' => $id,
                    'nome' => trim($_POST['nome']),
                    'cpf' => trim($_POST['cpf']),
                    'email' => trim($_POST['email']),
                    'idade' => trim($_POST['idade']),
                    'senha' => trim($_POST['senha']),
                    'nome_err' => '',
                    'cpf_err' => '',
                    'email_err' => '',
                    'idade_err' => '',
                    'senha_err' => ''
                    
                ];

                //Validating input

                if(empty($data['nome'])){
                    $data['nome_err'] = 'Insira um nome válido';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Insira um email válido';
                }else if($this->userModel->emailExists($data['email'])){

                    //Manage case of already existant email
                    //Check for the actual email too
                    if($data['email'] != $currentUser->email){

                        $data['email_err'] = 'Insira um email válido';
                    }
                    
                }

                if(empty($data['cpf'])){
                    $data['cpf_err'] = 'Insira um CPF válido';
                }else if(strlen($data['cpf']) > 15){
                    $data['cpf_err'] = 'Limite de caracteres do CPF atingido. Verifique erros de digitação.';
                }

                if(empty($data['senha'])){
                    $data['senha_err'] = 'Preencha o campo senha';
                }else if(strlen($data['senha']) < 6){
                    $data['senha_err'] = 'Favor utilizar uma senha com 6 ou mais caracteres';
                }
                if(empty($data['idade'])){
                    $data['idade_err'] = 'Insira uma idade válida';
                }

                if(empty($data['nome_err']) && empty($data['email_err']) && empty($data['cpf_err']) && empty($data['senha_err']) && empty($data['idade_err'])){

                    //Hash the password
                    $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

                    //Use the model to insert to DB
                    if($this->userModel->updateUser($data)){
                        echo "Updated";
                        //Redirect and flash a message
                        flash("msg_user", "Usuário editado com sucesso");
                        redirect('users/index');

                    }else{

                        die("Algum erro ocorreu. Manutenção reportada.");
                    }


                }else{

                    //Shows appointed errors
                    $this->view('users/edit', $data);
                }





            }else{

                

                $data = [
                    'id' => $id,
                    'nome' => trim($currentUser->nome),
                    'cpf' => trim($currentUser->cpf),
                    'email' => trim($currentUser->email),
                    'idade' => trim($currentUser->idade),
                    'senha' => ''

                ];

                $this->view('users/edit', $data);

            }

        }

        public function delete($id){
            
        }

        public function admin($id){

            //Make ordinary user into admin
            //If already admin, redirect
            
            //Admin only
            if(!loggedUserIsAdmin()){
                redirect('pages/index');//Might change
            }


        }

        public function login(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'senha' => trim($_POST['senha']),
                    'email_err' => '',
                    'senha_err' => ''
                ];


                if(empty($data['email'])){
                    $data['email_err'] = 'Entre com um email válido';
                }

                if(empty($data['senha'])){
                    $data['senha_err'] = 'Entre com uma senha válida';
                }

                //TODO: Check for user existance

                //No errors ocurring, then proceed to login checking
                if(empty($data['email_err']) && empty($data['senha_err'])){

                    $loggedInUser = $this->userModel->login($data['email'], $data['senha']);

                    if($loggedInUser){

                        //Set session data and redirect

                        $this->createUserSession($loggedInUser);
                        redirect('pages/index'); //Might change

                    }else{
                        //Incorrect login info

                        $data['senha_err'] = 'Senha ou Login Incorretos';
                        $data['senha'] = '';
                        $this->view('users/login', $data);

                    }

                }else{

                    $this->view('users/login', $data);
                }

            }else{

                $data = [

                    'email' => '',
                    'senha' => ''

                ];

                $this->view('users/login', $data);

            }


        }

        public function createUserSession($user){

            //Sets all user session variables from an 'user' object

            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_nome'] = $user->nome;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_cargo'] = $user->cargo;

            ////redirects

        }

        public function logout(){

            $this->destroyUserSession();
            redirect('users/login', []);
            

        }

        public function destroyUserSession(){

            //Unsets all user session variables from current logged user
            unset($_SESSION['user_id']);
            unset($_SESSION['user_nome']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_cargo']);
        } 


    }



?>