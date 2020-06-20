<?php require_once APPROOT.'/views/inc/header.php'; ?>

    <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Configurações do relatório</h2>
                    <form action="<?php echo URLROOT;?>/animals/report" method="post" target="_blank">
                        
                        <div class="form-group">
                            <label for="tipoRelatorio">Tipo:</label>
                            <select name="tipoRelatorio" id="tipoRelatorio" class="form-control form-control-lg">
                        
                                <option selected value="basico">Básico</option>
                                <option value="resumido">Resumido</option>
                                <option value="completo">Completo</option>
                            
                            </select>

                        </div>

                        

                        <div class="form-check form-check-inline mt-2">
                            <label for="incluirAdocoes" class="mr-2">Incluir informações de adoções   </label>
                            <input type="checkbox" name="incluirAdocoes" class="form-check-input">
                        </div>
                        
                        <div class="form-check form-check-inline mt-2">
                            <label for="incluirUsuario" class="mr-2">Incluir identificação de usuário   </label>
                            <input type="checkbox" name="incluirUsuario" class="form-check-input"> 
                        </div>
                        
                        
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Gerar PDF" class="btn btn-success btn-block">
                            </div>
                        </div>


                    </form>
                </div>
            </div>

    </div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>