<?php

class Cadastro
{
    public static function cadastroCliente($nome, $email, $telefone, $senha_cri, $nascimento_dia, $nascimento_mes, $nascimento_ano, $sexo, $objetivo, $status, $imagem, $cargo, $ativo)
    {
        $sql = MySql::conectar()->prepare('INSERT INTO `tb_clientes` VALUES
         (null, ?,?,?,?,?,?,?,?,?,?,?,?,?)');

        if ($sql->execute([$nome, $email, $telefone, $senha_cri, $nascimento_dia, $nascimento_mes, $nascimento_ano, $sexo, $objetivo, $status, $imagem, $cargo, $ativo])) {
            return true;
        } else {
            return false;
        }
    }

    public function conferirEmail($nome, $email, $telefone, $senha_cri, $nascimento_dia, $nascimento_mes, $nascimento_ano, $sexo, $objetivo, $status, $imagem, $cargo, $ativo)
    {
        $sql2 = MySql::conectar()->prepare('SELECT * FROM `tb_clientes` WHERE email = ?');
        if ($sql2->execute([$email])) {
            if ($sql2->rowCount() === 1) {
                echo 'E-email Cadastrado';
            } else {
                Cadastro::cadastroCliente($nome, $email, $telefone, $senha_cri, $nascimento_dia, $nascimento_mes, $nascimento_ano, $sexo, $objetivo, $status, $imagem, $cargo, $ativo);
                $assunto = 'Cadastro realizado com sucesso';
                $corpo = "<h2>Seu Login<h2>
                      <p>E-mail: $email</p>
                      <p>Senha: $senha_cri</p>  
                      ";
                $info = ['assunto' => $assunto, 'corpo' => $corpo];
                $mail = new Email('smtp.gmail.com', 'mdfconnection@gmail.com', 'znekbkdkshnikiuq', 'Chaves');
                $mail->addAdress($email, $nome);
                $mail->formatarEmail($info);
                $mail->enviarEmail();
                echo 'Enviado com sucesso';

                return true;
            }
        } else {
            return false;
        }
    }
}
