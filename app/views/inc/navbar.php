<nav class="navbar navbar-expand-lg navbar-light mb-3" style="background-color: #379683;">
  <div class="container">
  <a class="navbar-brand" href="<?php echo URLROOT;?>"><?php echo SITENAME;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT;?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/pages/doacoes">Doações</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/pages/about">Sobre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT;?>/animals/adoption">Adoção</a>
      </li>
      <?php if(isset($_SESSION["user_id"])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/animals/index/1">Animais</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/rescues/index/1">Resgates</a>
        </li>
      <?php endif; ?>
      


    </ul>

    <!--Animal (needs pagination), Usuario, Resgate/Solicitação, Doações, Noticias (needs pagination)-->

    <ul class="navbar-nav ml-auto">
    <?php if(loggedUserIsAdmin()) : ?>
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo URLROOT;?>/users/register">Registro</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo URLROOT;?>/users/index">Usuários</a>
        </li>
      <?php endif; ?>

      <?php if(isset($_SESSION["user_id"])) : ?>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/users/logout">Logout</a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/users/login">Login</a>
        </li>
      <?php endif; ?>
   
    </ul>
  </div>
  </div>
</nav>