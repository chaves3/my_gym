<?php

include '../config.php';

if (Painel::logado() == false) {
    include 'login.php';
} else {
    if ($_SESSION['cargo'] == 2 || $_SESSION['cargo'] == 3) {
        include 'main_admin.php';
    } else {
        include 'main_cliente.php';
    }
}
