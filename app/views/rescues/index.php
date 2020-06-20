<?php require_once APPROOT.'/views/inc/header.php'; ?>
    <div class="container">
        

        <div class="row">
            <div class='col-12 mb-3'>

            
            <h1>Solicitações de resgate</h1>
            <?php foreach($data['solicitacoes'] as $solicitacao): ?>
                <div class="row">
                    <div class="card card-body mb-3">
                        <h4 class="card-title"><?php echo $solicitacao->dataSolicitaBusca; ?></h4>
                        <p class="card-text"><?php echo $solicitacao->descricao; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>


    </div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>