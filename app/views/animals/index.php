<?php require_once APPROOT.'/views/inc/header.php'; ?>
    <div class="container">
        <?php if(userIsLoggedIn()):?>
        <div class='row'>
            <div class="col-12 mb-3">
                
                
                <a class="btn btn-primary btn-success btn-lg float-right ml-2" href="<?php echo URLROOT; ?>/animals/register">Registrar animal</a>
                <a class="btn btn-primary btn-secondary btn-lg float-right ml-2" href="<?php echo URLROOT; ?>/animals/report">Gerar relatório</a>
                
            </div>
        </div>
        <?php endif;?>
        

        <div class="row">
            <div class='col-12 mb-3'>

            <?php 
                $flashed_msg = flash("msg_animal");

                if($flashed_msg) :
            ?>
                <div class="alert alert-success" id="msg-flash"><?php echo $flashed_msg; ?></div>
            <?php endif;?>

            <?php foreach($data['animals'] as $animal): ?>
                <div class="row">
                    <div class="card card-body mb-3">
                        <h4 class="card-title"><?php echo $animal->nome; ?></h4>
                        <p class="card-text"><?php echo $animal->descricao; ?></p>
                        <a class="btn btn-dark" href="<?php echo URLROOT; ?>/animals/show/<?php echo $animal->idAnimal; ?>">Detalhes</a>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <!--MENU DE PAGINACAO AQUI-->
                <div class="row justify-content-center pb-4">

                    <a class="btn btn-outline-secondary" href="<?php echo URLROOT; ?>/animals/index/<?php echo ($data['pageNumber'] > 1 ? $data['pageNumber'] - 1 : $data['pageNumber']); ?>"> < </a>
                    
                    <?php if($data['pageNumber'] > ceil(PAGES_SHOWN / 2) + 1 && $data['totalPages'] > PAGES_SHOWN):?>
                        <a class="btn btn-outline-secondary" href='#'>...</a>
                        
                    <?php 
                
                        $limits['liminf'] += 1;
                        endif;
                    ?>

                    <?php
                    
                        $limits = definePageInterval($data['pageNumber'], $data['totalPages']);
                        for($i = $limits['liminf']; $i <= $limits['limsup']; $i++):     
                        
                    ?>

                        <a class="btn <?php echo $i == $data['pageNumber'] ? 'btn-outline-success' : 'btn-outline-secondary' ;?>" href="<?php echo URLROOT; ?>/animals/index/<?php echo $i; ?>"> <?php echo $i; ?> </a>

                    <?php endfor;?>

                    <?php if($data['pageNumber'] + ceil(PAGES_SHOWN / 2)  < $data['totalPages'] && $data['totalPages'] > PAGES_SHOWN):?>
                        <a class="btn btn-outline-secondary" href='#'>...</a>
                    <?php endif;?>

                    <a class="btn btn-outline-secondary" href="<?php echo URLROOT; ?>/animals/index/<?php echo ($data['pageNumber'] >= $data['totalPages'] ? $data['pageNumber'] : $data['pageNumber'] + 1); ?>"> > </a>

                </div>

            </div>

        </div>

    </div>


<?php require_once APPROOT.'/views/inc/footer.php'; ?>