<?php require_once APPROOT.'/views/inc/header.php'; ?>

    <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Cadastrar novo animal</h2>
                    <form action="<?php echo URLROOT;?>/animals/register" method="post">
                        <div class="form-group">
                            <label for="nome">Nome: <sup>*</sup></label>
                            <input type="text" name="nome" class="form-control form-control-lg <?php echo(!empty($data['nome_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['nome'];?>"> 
                            <span class="invalid-feedback"><?php echo $data["nome_err"];?></span>

                        </div>
                        <div class="form-group">
                            <label for="idade">Idade (anos): <sup>*</sup></label>
                            <input type="number" name="idade" class="form-control form-control-lg <?php echo(!empty($data['idade_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['idade'];?>"> 
                            <span class="invalid-feedback"><?php echo $data["idade_err"];?></span>

                        </div>
                        <div class="form-group">
                            <label for="statusAnimal">Status: <sup>*</sup></label>
                            <select name="statusAnimal" id="statusAnimal" class="form-control form-control-lg <?php echo(!empty($data['status_err']) ? 'is-invalid' : '');?>">
                        
                                <option selected value="Excelente">Excelente</option>
                                <option value="Bom">Bom</option>
                                <option value="Mediano">Mediano</option>
                            
                            </select>
                            <span class="invalid-feedback"><?php echo $data["status_err"];?></span>

                        </div>
                        <div class="form-group">
                            <label for="datarecolhimento">Data de recolhimento: <sup>*</sup></label>
                            <input type="date" name="datarecolhimento" class="form-control form-control-lg <?php echo(!empty($data['rec_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['datarecolhimento'];?>">
                            <span class="invalid-feedback"><?php echo $data["rec_err"];?></span>

                        </div>
                        <div class="form-group">
                            <label for="especie">Especie: <sup>*</sup></label>
                            <input type="text" name="especie" class="form-control form-control-lg <?php echo(!empty($data['especie_err']) ? 'is-invalid' : '');?>" value="<?php echo $data['especie'];?>">
                            <span class="invalid-feedback"><?php echo $data["especie_err"];?></span>

                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição: <sup>*</sup></label>
                            <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control form-control-lg <?php echo(!empty($data['descricao_err']) ? 'is-invalid' : '');?>">
                                <?php echo $data['descricao'];?>
                            </textarea>
                                                    
                            <span class="invalid-feedback"><?php echo $data["descricao_err"];?></span>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Registrar" class="btn btn-success btn-block">
                            </div>

                        </div>
                    </form>
                </div>
            </div>

    </div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>