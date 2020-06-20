<?php require_once APPROOT.'/views/inc/header.php'; ?>
    <div class="container">
        

        <div class="row">
            <div class='col-12 mb-3'>

            <?php 
                $flashed_msg = flash("msg_rescue");

                if($flashed_msg) :
            ?>
                <div class="alert alert-success" id="msg-flash"><?php echo $flashed_msg; ?></div>
            <?php endif;?>

            <?php 
                $flashed_msg = flash("msg_rescues");

                if($flashed_msg) :
            ?>
                <div class="alert alert-success" id="msg-flash"><?php echo $flashed_msg; ?></div>
            <?php endif;?>
            <h1>Resgate de animais</h1>
            <p>Sobre o serviço de resgate.... </p>
            
            </div>
        </div>


    </div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
