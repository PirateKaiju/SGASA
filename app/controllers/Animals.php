<?php

    class Animals extends Controller{

        public function __construct(){



            //Registering the animal model
            $this->animalModel = $this->model('Animal');
            
        }


        public function index($pageNumber = 1){

            //TESTS ONLY
            /*echo $pageNumber;
            $this->view('animals/index',[] );*/

            if(!userIsLoggedIn()){

                redirect('users/login'); //Might Change
            }

            //Total number of pages to engulf all itens to be shown
            $totalItens = (int) $this->animalModel->countAllAnimals()->contagem;
            $totalPages = calculateTotalPages($totalItens);

            //var_dump($totalItens);//TEST
            //var_dump($totalPages);//TEST



            //Check if required page is in limits
            if($pageNumber >= 1 && $pageNumber <= $totalPages){

                //Using pagination here

                //Gets the animals in a interval to compose a page

                $animals = $this->animalModel->getAnimals($pageNumber);

                //var_dump($animals);//TEST

                $data = [
                    'animals' => $animals,
                    'pageNumber' => $pageNumber,
                    'totalPages' => $totalPages
                ];

                $this->view('animals/index', $data);


            }else{

                //For unexistant pages
                //die('Erro: Acesso a recurso inexistente'); //Elaborate a better error page
                throwError404();
                //$this->view("errors/404.php", []);
                //redirect('errors/error404');
            }

        }


        public function register(){
            //Register an animal to database
            //This action is available in animals/index
            //Exclusive for users

            //TODO: OPCOES PARA UPLOAD DE FOTOS

            if(!userIsLoggedIn()){

                //Flash a massage here too

                redirect('users/login');

            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'nome' => trim($_POST['nome']),
                    'idade' => trim($_POST['idade']),
                    'statusAnimal' => trim($_POST['statusAnimal']),
                    'datarecolhimento' => trim($_POST['datarecolhimento']),
                    'especie' => trim($_POST['especie']),
                    'descricao' => trim($_POST['descricao']),
                    'nome_err' => '',
                    'idade_err' => '',
                    'status_err' => '',
                    'rec_err' => '',
                    'especie_err' => '',
                    'descricao_err' => ''
                ];

                if(empty($data['nome'])){

                    $data['nome_err'] = 'Favor entrar com o nome do animal';
                }

                if(empty($data['idade'])){

                    $data['idade_err'] = 'Favor entrar com a idade do animal';
                }

                //Checking options
                
                if(!in_array($data['statusAnimal'], ['Excelente', 'Bom', 'Mediano'])){ 

                    $data['status_err'] = 'Selecione corretamente um status para a condição de saúde do animal';
                }

                if(empty($data['datarecolhimento'])){
                    $data['rec_err'] = 'Favor entrar com a data de recolhimento';
                }

                if(empty($data['especie'])){

                    $data['especie_err'] = 'Favor definir a espécie do animal';
                }

                //Descricao can be empty

                if(empty($data['nome_err']) && empty($data['idade_err']) && empty($data['status_err']) && empty($data['rec_err']) && empty($data['especie_err']) && empty($data['descricao_err'])){

                    //Insert to db

                    if($this->animalModel->register($data)){
                        //Managed to register successfully

                        //Redirect and flash a message

                        flash("msg_animal", "Registrado com sucesso");

                        redirect('animals/index/1');
                        //echo('pass register');
                        //redirect('pages/index');

                    }else{
                        die("Algum erro ocorreu. Manutenção reportada.");
                    }

                }else{

                    $this->view('animals/register', $data);
                }


            }else{

                $data = [
                    'nome' => '',
                    'idade' => '',
                    'status' => '',
                    'datarecolhimento' => '',
                    'especie' => ''
                ];

                $this->view('animals/register', $data);


            }

        }

        public function show($idAnimal){

            if(!userIsLoggedIn()){

                //Flash a massage here too

                redirect('users/login');

            }

            $shownanim = $this->animalModel->getAnimalById($idAnimal);

            $data = [
                'animal' => $shownanim
            ];

            $this->view('animals/show', $data);



        }

        public function edit($id){
            //Edit an animal from database

            if(!userIsLoggedIn()){

                //Flash a massage here too

                redirect('users/login');

            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'nome' => trim($_POST['nome']),
                    'idade' => trim($_POST['idade']),
                    'statusAnimal' => trim($_POST['statusAnimal']),
                    'datarecolhimento' => trim($_POST['datarecolhimento']),
                    'especie' => trim($_POST['especie']),
                    'descricao' => trim($_POST['descricao']),
                    'nome_err' => '',
                    'idade_err' => '',
                    'status_err' => '',
                    'rec_err' => '',
                    'especie_err' => '',
                    'descricao_err' => ''
                ];

                if(empty($data['nome'])){

                    $data['nome_err'] = 'Favor entrar com o nome do animal';
                }

                if(empty($data['idade'])){

                    $data['idade_err'] = 'Favor entrar com a idade do animal';
                }

                //Checking options
                
                if(!in_array($data['statusAnimal'], ['Excelente', 'Bom', 'Mediano'])){ 

                    $data['status_err'] = 'Selecione corretamente um status para a condição de saúde do animal';
                }

                if(empty($data['datarecolhimento'])){
                    $data['rec_err'] = 'Favor entrar com a data de recolhimento';
                }

                if(empty($data['especie'])){

                    $data['especie_err'] = 'Favor definir a espécie do animal';
                }

                //Descricao can be empty

                if(empty($data['nome_err']) && empty($data['idade_err']) && empty($data['status_err']) && empty($data['rec_err']) && empty($data['especie_err']) && empty($data['descricao_err'])){

                    //Insert to db

                    if($this->animalModel->updateAnimal($data)){
                        //Managed to register successfully

                        //Redirect and flash a message
                        redirect('animals/index/1');//Maybe a new logic?
                        //echo('pass register');
                        //redirect('pages/index');

                    }else{
                        die("Algum erro ocorreu. Manutenção reportada.");
                    }

                }else{

                    $this->view('animals/edit', $data);
                }


            }else{

                //Find and display animal data

                $currentAnimal = $this->animalModel->getAnimalById($id);

                $data = [
                    'id' => trim($currentAnimal->idAnimal),
                    'nome' => trim($currentAnimal->nome),
                    'idade' => trim($currentAnimal->idade),
                    'statusAnimal' => trim($currentAnimal->statusAnimal),
                    'datarecolhimento' => trim($currentAnimal->datarecolhimento),
                    'especie' => trim($currentAnimal->especie),
                    'descricao' => trim($currentAnimal->descricao)
                ];

                $this->view('animals/edit', $data);


            }

        }

        public function delete($id){
            //Deletes an animal and redirects

            $id = filter_var($id, FILTER_SANITIZE_STRING);

            if(userIsLoggedIn()){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    if($this->animalModel->deleteById($id)){
                        //Flash message 

                        //flash()
                        
                    }else{
                        die("Algum erro ocorreu. Manutenção reportada.");
                    }

                }
                //And redirect
                
                redirect('animals/index');
                
            }else{
                die('Erro: Login necessário para completar esta ação. Manutenção reportada.');
            }

        }

        public function adoption($pageNumber = 1){
            //Acessible to all visitors

            //All adoptable animals
            
            $totalItens = (int) $this->animalModel->countAllAdoptable()->contagem;

            $totalPages = calculateTotalPages($totalItens);

            if($pageNumber >= 1 && $pageNumber <= $totalPages){
                $animals = $this->animalModel->getAdoptablePaged($pageNumber);

                $data = [
                    'animals' => $animals,
                    'pageNumber' => $pageNumber,
                    'totalPages' => $totalPages
                ];

                $this->view('animals/adoption', $data);

            }else{
                die('Erro: Acesso a recurso inexistente');
            }



        }

        public function report(){

            //Generates a printable report 
            if(!userIsLoggedIn()){
                redirect('users/login');
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'tipoRelatorio' => trim($_POST['tipoRelatorio']),
                    'incluirAdocoes' => trim($_POST['incluirAdocoes']),
                    'incluirUsuario' => trim($_POST['incluirUsuario']) 
                
                 ];

                 //require_once '../app/libraries/vendor/fpdf/fpdf.php';


                 $this->animalModel->report($data);

                

            }else{

                $data = [
                    'tipoRelatorio' => 'basico',
                    'incluirAdocoes' => '',
                    'incluirUsuario' => '' 
                
                 ];

                $this->view('animals/report', $data);

            }



        }





    }



//ANIMALS/1 -> 1 PAGINA  &  ANIMALS/SHOW/1
?>