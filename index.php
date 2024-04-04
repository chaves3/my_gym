<?php include 'config.php'; 

Site::updateUsuarioOnline();
Site::contador();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu website">
    <meta name="keywords" content="palavras-chave, do meu site">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@300;700&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans:wght@400&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <title>Site Dinâmico</title>
</head>
<body>
<base href="<?php echo INCLUDE_PATH; ?>">
<?php

$url = isset($_GET['url']) ? $_GET['url'] : 'home';

switch ($url) {
    case 'sobre':
        print "<target target='sobre'/>";
        break;

    case 'servicos':
        print "<target target='servicos'/>";
        break;
}

?>

<header>
    <div class="center">
    <div class="logo left"><a href="index.php"><img style="height: 70px;" src="img/logo.jpg" alt=""></a></div><!--logo-->
    <nav class="desktop right">
        <ul>
            <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
            <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
            <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
            <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
            <li><a realtime="cadastro" href="<?php echo INCLUDE_PATH; ?>cadastro">Cadastro</a></li>
        </ul>
    </nav><!--desktop-->

    <nav class="mobile right">
        <div class="botao-menu-mobile">
        <i class="bi bi-list"></i>
        </div>
        <ul>
        <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
            <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
            <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
            <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
            <li><a realtime="cadastro" href="<?php echo INCLUDE_PATH; ?>cadastro">Cadastro</a></li>
        </ul>
    </nav><!--mobile-->
    <div class="clear"></div>
    </div><!--center-->
</header>

<div class="container-principal">

<?php

if (file_exists('pages/'.$url.'.php')) {
    include 'pages/'.$url.'.php';
} else {
    // podemos fazer o que quiser, pois a página não existe

    if ($url != 'sobre' && $url != 'servicos') {
        $pagina404 = true;
        include 'pages/404.php';
    } else {
        include 'pages/home.php';
    }
}

?>

</div><!--container-principal-->


<footer <?php if (isset($pagina404) && $pagina404 == true) {
    echo "class='fixed'";
}

?>>
    <div class="center">
    <p>Todos os direitos reservados</p>
    </div><!--center-->
</footer>

<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>

<?php if ($url == 'home' || $url == '') {?>
<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/email-ajax.js"></script>
<?php } ?>

<?php
    if ($url == 'contato') {
        ?>
<?php } ?>

<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>

</body>
</html>