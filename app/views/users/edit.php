<?php require_once APPROOT.'/views/inc/header.php'; ?>

    <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Editar usuário</h2>
                    <form action="<?php echo URLROOT;?>/users/edit/<?php echo $data['id']; ?>" method="post">
                        <div class="form-group">
                            <label for="nome">Nome: <sup>*</sup></label>
                            <input type="text" name="nome" class="form-control form-control-lg <?php echo(!empty($data['nome_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['nome'];?>"> 
                            <span class="invalid-feedback"><?php echo $data["nome_err"];?></span>

                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF: <sup>*</sup></label>
                            <input type="text" name="cpf" class="form-control form-control-lg <?php echo(!empty($data['cpf_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['cpf'];?>"> 
                            <span class="invalid-feedback"><?php echo $data["cpf_err"];?></span>

                        </div>
                        <div class="form-group">
                            <label for="idade">Idade: <sup>*</sup></label>
                            <input type="number" name="idade" class="form-control form-control-lg <?php echo(!empty($data['idade_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['idade'];?>"> 
                            <span class="invalid-feedback"><?php echo $data["idade_err"];?></span>

                        </div>
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo(!empty($data['email_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['email'];?>">
                            <span class="invalid-feedback"><?php echo $data["email_err"];?></span>

                        </div>
                        <div class="form-group">
                            <label for="senha">Senha: <sup>*</sup></label>
                            <input type="password" name="senha" class="form-control form-control-lg <?php echo(!empty($data['senha_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['senha'];?>">
                            <span class="invalid-feedback"><?php echo $data["senha_err"];?></span>

                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Concluir" class="btn btn-success btn-block">
                            </div>
                        </div>


                    </form>
                </div>
            </div>

    </div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>