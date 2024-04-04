<?php

if (isset($_COOKIE['lembrar'])) {
    $email = $_COOKIE['email'];
    $senha = $_COOKIE['senha'];

    $sql = MySql::conectar()->prepare('SELECT * FROM `tb_clientes`
    WHERE email = ? AND senha	= ? ');
    $sql->execute([$email, $senha]);

    $sql2 = MySql::conectar()->prepare('UPDATE `tb_clientes`
    SET status = ? WHERE email =  ?');
    $sql2->execute(['online', $email]);

    if ($sql->rowCount() == 1) {
        $info = $sql->fetch();
        // Logamos com sucesso
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['status'] = $info['status'];
        $_SESSION['nome'] = $info['nome'];
        $_SESSION['foto'] = $info['foto'];
        $_SESSION['cargo'] = $info['cargo'];

        header('Location: '.INCLUDE_PATH_PAINEL);
        exit;
    }
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

<div class="box-login">
    <?php

    if (isset($_POST['acao'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_clientes`
        WHERE email = ? LIMIT 1");
        $sql->execute([$email]);

        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
        if (password_verify($senha, $usuario['senha'])){
     
       $sql2 = MySql::conectar()->prepare('UPDATE `tb_clientes`
        SET status = ? WHERE email =  ?');
        $sql2->execute(['online', $email]);

        if ($sql->rowCount() == 1) {
            // Logamos com sucesso
            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['telefone'] = $usuario['telefone'];
            $_SESSION['status'] = $usuario['status'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['foto'] = $usuario['foto'];
            $_SESSION['cargo'] = $usuario['cargo'];
            $_SESSION['ativo'] = $usuario['ativo'];
            
            if (isset($_POST['lembrar'])) {
                setcookie('lembrar', true, time() + (60 * 60 * 24), '/');
                setcookie('user', $email, time() + (60 * 60 * 24), '/');
                setcookie('senha', $senha, time() + (60 * 60 * 24), '/');
            }
            header('Location: '.INCLUDE_PATH_PAINEL);
            exit;
        }
        } else {
            // Falhou ao logar
            echo "<div class = 'erro-box'><i class='fa-solid fa-xmark'></i> Usuário ou senha incorretos!</div>";
        }
    }

?>
    <form action="" method="post">
        <h2>Efetue o login!</h2>
        <input type="email" name="email" placeholder="Login..." required>
        <input type="password" name="senha" id="senha" placeholder="Senha...">
        <div class="form-group-login left">
        <input type="submit" name="acao" value="Logar!">
        <div><!--form-group=login-->
       
        <div class="form-group-login right">
        <label style="color: #F4B03E;" for="lembrar">Lembrar-me</label>
        <input type="checkbox" name="lembrar" id="lembrar">
        <div><!--form-group-login-->
        <div class="clear"><div>
    </form>
</div><!--box-login-->

</body>
</html>

