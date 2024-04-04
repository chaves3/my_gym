<?php

class Usuario
{
    public function atualizarUsuario($nome, $senha_cri, $telefone, $imagem)
    {
        $sql = MySql::conectar()->prepare('UPDATE `tb_clientes` 
        SET nome = ?, senha = ?, telefone = ?, foto = ? WHERE email = ?');
        if ($sql->execute([$nome, $senha_cri, $telefone, $imagem, $_SESSION['email']])) {
            return true;
        } else {
            return false;
        }
    }

    public static function userExists($email)
    {
        $sql = MySql::conectar()->prepare('SELECT `id` FROM `tb_clientes`WHERE email = ? ');
        $sql->execute([$email]);
        if ($sql->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function cadastrarSubadmin($nome, $email, $telefone, $senha, $nascimento_dia, $nascimento_mes, $nascimento_ano, $sexo, $status, $imagem, $cargo)
    {
        $sql = MySql::conectar()->prepare('INSERT INTO `tb_clientes` (nome, sobrenome, email, telefone, senha, dia_nascimento, mes, ano, sexo, status, foto, cargo) VALUES
        (?,?,?,?,?,?,?,?,?,?,?)');
        $sql->execute([$nome, $email, $telefone, $senha, $nascimento_dia, $nascimento_mes, $nascimento_ano, $sexo, $status, $imagem, $cargo]);
        $assunto = 'Cadastro realizado com sucesso';
        $corpo = "<h2>Seu Login De Sub Administrado da Academia Chaves<h2>
              <p>E-mail: $email</p>
              <p>Senha: $senha</p>  
              ";
        $info = ['assunto' => $assunto, 'corpo' => $corpo];
        $mail = new Email('smtp.gmail.com', 'mdfconnection@gmail.com', 'znekbkdkshnikiuq', 'Chaves');
        $mail->addAdress($email, $nome);
        $mail->formatarEmail($info);
        $mail->enviarEmail();
        echo 'Enviado com sucesso';
    }
}
