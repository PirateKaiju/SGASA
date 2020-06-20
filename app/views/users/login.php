<?php require_once APPROOT.'/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            
            

            <div class="card card-body bg-light mt-5">
                <?php //flash("register_success");?>
                <h2>Login</h2>
                <form action="<?php echo URLROOT;?>/users/login" method="post">
                    
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
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                        <?php if(loggedUserIsAdmin()) : ?>
                            <div class="col">
                                <a href="<?php echo URLROOT;?>/users/register" class="btn btn-light btn-block">Registrar novo usuário</a>
                            </div>
                        <?php endif; ?>
                    </div>


                </form>
            </div>
        </div>

    </div>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>