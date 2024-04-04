<?php

if (isset($_GET['loggout'])) {
    Painel::loggout();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@400&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Painel de controle</title>
</head>
<body>

<div class="menu">
    <div class="menu-wraper">
    <div class="box-usuario">
        <?php
            if ($_SESSION['foto'] == '') {
                ?>
        <div class="avatar-usuario">
          <i class="fa-solid fa-user"></i>
        </div><!--avatar-usuario-->
        <?php } else { ?>
        <div class="imagem-usuario">
          <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['foto']; ?>" alt="">
        </div><!--avatar-usuario-->
       <?php } ?>
        <div class="nome-usuario">
            <p>Nome: <?php echo $_SESSION['nome']; ?></p>
            <p>Cargo: <?php echo pegaCargo($_SESSION['cargo']); ?><p>
        </div><!--nome-usuariuo-->
    </div><!--box-usuario-->
    <div class="items-menu">
		<h2>Configurações Pessoais</h2>
		<a <?php selecionarMenu('informacoes-pessoais'); ?>  href="<?php echo INCLUDE_PATH_PAINEL; ?>informacoes-pessoais">Informações Pessoais</a>

	</div><!--items-menu-->
    </div><!--menu-wraper-->
</div><!--menu-->




<header>
    <div class="center">
        <div class="menu-btn">
        <i style="color: #F4B03E;" class="fa-solid fa-bars"></i>
        </div><!--menu-btn-->
    <div class="loggout">
        <a <?php if (@$_GET['url'] == '') { ?> style="padding:5px; background-color: #60727a;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>"><i style="color: #F4B03E;" class="fa-solid fa-house"></i> <span style="color: #F4B03E;">Página inicial</span></a> 
        <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i style="color: #F4B03E;" class="fa-solid fa-right-from-bracket"></i> <span style="color: #F4B03E;">Sair</span></a>
    </div><!--logout-->
    <div class="clear"></div>
    </div><!--center-->
</header>

<div class="content">
  <?php Painel::carregarPagina(); ?>
</div><!--content-->
<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
</body>
</html>