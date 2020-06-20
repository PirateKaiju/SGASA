<?php require_once APPROOT.'/views/inc/header.php'; ?>

    <div class="container">
        <div class="col-12 mb-3 bg-light">
            <h1><?php echo $data['animal']->nome; ?></h1>
            <p><?php echo $data['animal']->idade; ?> anos</p>
            <p><?php echo $data['animal']->descricao; ?></p>


            <div class="row">
                <div class="col-12 mb-3">
                    <a href="<?php echo URLROOT;?>/animals/edit/<?php echo $data['animal']->idAnimal; ?>" class="btn btn-secondary">Editar</a>
                    <form class="float-right" action="<?php echo URLROOT;?>/animals/delete/<?php echo $data['animal']->idAnimal?>" method="POST">
                        <input type="submit" value="Deletar" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>