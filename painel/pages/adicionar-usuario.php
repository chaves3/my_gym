
<?php

    verificaPermissaoPagina(2);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="box-content">
    <h2><i class="bi bi-pen-fill"></i> Adicionar Sub Administradores</h2>
    <form action="" method="post" enctype="multipart/form-data">

    <?php
        if (isset($_POST['acao'])) {
            $erro = 0;
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            $forca = 0;
            $nascimento_dia = $_POST['nascimento-dia'];
            $nascimento_mes = $_POST['nascimento-mes'];
            $nascimento_ano = $_POST['nascimento-ano'];
            $sexo = $_POST['sexo'];
            $status = 'offline';
            $imagem = $_FILES['imagem'];
            $cargo = 2; //$_POST['cargo'];

            $verifica_nome = preg_match('/[a-z]{3,}/', $nome);
            $regexTelefone = preg_match('/^[0-9]{10}$/', $telefone);

            if (!$verifica_nome) {
                Painel::alert('erro', 'Nome incorreto!');
                $erro = 1;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Painel::alert('erro', 'E-mail incorreto!');
                $erro = 1;
            }

            if(!$regexTelefone){
                Painel::alert('erro', 'Telefone incorreto');
                $erro = 1;
            }

            if (preg_match('/[a-z0-9]+/', $senha)) {
                $forca += 10;
            }

            if (preg_match('/[A-Z]+/', $senha)) {
                $forca += 20;
            }
            if (preg_match('/[@#$%&;*]/', $senha)) {
                $forca += 20;
            }

            if ($forca < 50) {
                Painel::alert('erro', 'Senha fraca, deve ter no mínimo 8 caracters e Coloque um caracter especial e uma letra Maiúscula');
                $erro = 1;
            }

            if ($nascimento_dia == '') {
                Painel::alert('erro', 'Preencha o dia!');
                $erro = 1;
            } elseif ($nascimento_mes == '') {
                Painel::alert('erro', 'Preencha o mês!');
                $erro = 1;
            } elseif ($nascimento_ano == '') {
                Painel::alert('erro', 'Preencha o ano!');
                $erro = 1;
            } elseif ($sexo == '') {
                Painel::alert('erro', 'Preencha o sexo');
                $erro = 1;
            } else {
                
                $senha_cri = password_hash($senha, PASSWORD_DEFAULT);

                }if (Painel::imagemValida($imagem) == false) {
                    Painel::alert('erro', 'A imagem precisa de um formato correto!');
                } elseif (Usuario::userExists($email)) {
                    Painel::alert('erro', 'O login já existe!');
                } else {
                    $usuario = new Usuario();
                    $imagem = Painel::uploadFile($imagem);
                    $usuario->cadastrarSubadmin($nome, $email, $telefone, $senha_cri, $nascimento_dia, $nascimento_mes, $nascimento_ano, $sexo, $status, $imagem, $cargo);
                    Painel::alert('sucesso', 'O cadastro do '.$email.' Foi realizado com sucesso');
                
            }
        }

?>

        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" value="<?php recoverPost('nome'); ?>">
        </div><!--form-group-->
        
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php recoverPost('email'); ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="telefone-admin" placeholder="DD99999999" value="<?php recoverPost('telefone'); ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" value="<?php recoverPost('senha'); ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="dia">Nascimento:</label>
            <select name="nascimento-dia" id="dia" class="nascimento" value="<?php recoverPost('nascimento-dia'); ?>">
              <?php
            for ($i = 1; $i <= 31; ++$i) {
                ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                 <?php } ?>
           </select>
        </div><!--form-group-->

        <div class="form-group">
            <label for="nascimento-mes">Mes:</label>
            <select name="nascimento-mes" id="nascimento-mes" class="nascimento" value="<?php recoverPost('nascimento-mes'); ?>">
                <!--Aplicar o PHP depois-->
             <option value="1">Janeiro</option>
             <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
             <option value="12">Dezembro</option>
                        </select>
        </div><!--form-group-->

        <div class="form-group">
            <label for="ano">Ano:</label>
            <select name="nascimento-ano" class="nascimento" id="ano" value="<?php recoverPost('nascimento-ano'); ?>">
                       
                       <?php
                       for ($ano = 1960; $ano <= 2024; ++$ano) {
                           ?>
                           <option value="<?php echo $ano; ?>"><?php echo $ano; ?></option>
                           <?php } ?>
                </select>
        </div><!--form-group-->

        <div class="form-group">
        <label for="sexo">Sexo:</label>  
        <div class="input-radio">
           <input type="radio" name="sexo" id="sexo" value="masculino">
              <h2>Masculino</h2>
        </div><!--input-radio-->
            <div class="input-radio">
               <input type="radio" name="sexo" id="" value="Feminino">
                  <h2>Feminino</h2>
                  </div><!--input-radio-->
        <div class="clear"></div>               
        </div><!--form-group-->

      <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem" >
        </div><!--form-group-->
       
       <!-- 
      <div class="form-group">
            <label for="">Cargo:</label>
           <select name="cargo" id="cargo">
                
                <?php //foreach (Painel::$cargos as $key => $value) {
                    //if ($key < $_SESSION['cargo']) {
                      //  echo '<option value="'.$key.'">'.$value.'</option>';
                    //}
                //}
?>
           </select>
        </div>
            -->
        <div class="form-group">
          <input type="submit" name="acao" value="Cadastrar!">
        </div><!--form-group-->
        

    </form>
</div><!--box-content-->
<script src="js/jquery.js"></script>
<script src="js/jquery.mask.js"></script>
<script>
   $('.telefone-admin').mask("0000000000");
</script>