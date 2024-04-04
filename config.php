<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');
$autoload = function ($class) {
    if ($class == 'Email') {
        require_once 'classes/phpmailer/src/PHPMailer.php';
        require_once 'classes/phpmailer/src/SMTP.php';
        require_once 'classes/phpmailer/src/Exception.php';
    }

    include 'classes/'.$class.'.php';
};

spl_autoload_register($autoload);

define('INCLUDE_PATH', 'http://localhost/academia_bradock/');
define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');
define('BASE_DIR_PAINEL', __DIR__.'/painel');

// Conectar com o banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'academia_treino');

define('NOME_EMPRESA', 'ACADEMIA CHAVES');

function pegaCargo($cargo)
{
    $array = ['0' => 'Normal',  '1' => 'Usuário', '2' => 'Sub Administrador', '3' => 'Administrador'];

    return $array[$cargo];
}

function selecionarMenu($par)
{
    $url = explode('/', @$_GET['url'])[0];
    if ($url == $par) {
        echo 'class=menu-active';
    }
}

function vereficaPermissaoMenu($permissao)
{
    if ($_SESSION['cargo'] >= $permissao) {
        return;
    } else {
        echo "style='display:none;'";
    }
}

function verificaPermissaoPagina($permissao)
{
    if ($_SESSION['cargo'] >= $permissao) {
        return;
    } else {
        include 'painel/pages/permissao_negado.php';
        exit;
    }
}

function recoverPost($post)
{
    if (isset($_POST[$post])) {
        echo $_POST[$post];
    }
}
