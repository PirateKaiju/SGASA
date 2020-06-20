<?php require_once APPROOT.'/views/inc/header.php'; ?>

        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Resgate de animais</h2>
                    <p>Utilize o formulário a seguir para cadastrar uma solicitação de resgate. A mesma será verificada e atendida assim que possível.</p>
                    <form action="<?php echo URLROOT;?>/rescues/register" method="post">
                        <div class="form-group">
                            <label for="cpf">CPF: <sup>*</sup></label>
                            <input type="text" name="cpf" class="form-control form-control-lg <?php echo(!empty($data['cpf_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['cpf'];?>"> 
                            <span class="invalid-feedback"><?php echo $data["cpf_err"];?></span>

                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição: <sup>*</sup></label>
                            <textarea name="descricao" id="descricao" cols="30" rows="20" class="form-control form-control-lg <?php echo(!empty($data['descricao_err']) ? 'is-invalid' : '');?>">
                                <?php echo $data['descricao'];?>
                            </textarea>
                                                    
                            <span class="invalid-feedback"><?php echo $data["descricao_err"];?></span>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Solicitar busca" class="btn btn-success btn-block">
                            </div>

                        </div>
                    </form>
                </div>
            </div>

    </div>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>