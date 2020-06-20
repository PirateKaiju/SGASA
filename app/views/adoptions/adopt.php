<?php require_once APPROOT.'/views/inc/header.php'; ?>

    <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Solicitação de adoção de animal</h2>
                    <p>Utilize o formulário a seguir para requisitar o início do processo de adoção. As informações serão passadas aos
                    responsáveis e estando tudo nos conformes, você será contactado através do email fornecido abaixo, para o prosseguimento do processo. Favor
                    entrar com email e informações de identificação corretamente, para evitar problemas no registro do processo. Ao final, preencha o texto de declaração de forma breve e concisa. 
                    </p>
                    <form action="<?php echo URLROOT;?>/adoptions/adopt/<?php echo $data['idAnimal']; ?>" method="post">
                        <div class="form-group">
                            <label for="nome">Nome completo: <sup>*</sup></label>
                            <input type="text" name="nome" class="form-control form-control-lg <?php echo(!empty($data['nome_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['nome'];?>"> 
                            <span class="invalid-feedback"><?php echo $data["nome_err"];?></span>

                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF: <sup>*</sup></label>
                            <input type="text" name="cpf" class="form-control form-control-lg <?php echo(!empty($data['cpf_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['cpf'];?>"> 
                            <span class="invalid-feedback"><?php echo $data["cpf_err"];?></span>

                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo(!empty($data['email_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['email'];?>">
                            <span class="invalid-feedback"><?php echo $data["email_err"];?></span>

                        </div>
                        

                        <div class="form-group">
                            <label for="declaracao">Declaração: <sup>*</sup></label>
                            <textarea name="declaracao" id="declaracao" cols="30" rows="10" class="form-control form-control-lg <?php echo(!empty($data['declaracao_err']) ? 'is-invalid' : '');?>">
                                <?php echo $data['declaracao'];?>
                            </textarea>
                                                    
                            <span class="invalid-feedback"><?php echo $data["declaracao_err"];?></span>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Solicitar adoção" class="btn btn-success btn-block">
                            </div>

                        </div>
                    </form>
                </div>
            </div>

    </div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>