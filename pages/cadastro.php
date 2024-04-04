<section class="cadastro-cliente">
    <div class="center">
    <div class="cadastrando-cliente right">
       <h2 class="ficar-celular">Cadastro:</h2>
       <form action="" method="post" class="criar-conta">
            
                    <div class="meio">
                        <input type="text" name="nome" placeholder="Nome Completo" value="<?php recoverPost('nome'); ?>">
                         <small class="erro1" style="color: red; display: none">Nome incorreto</small>
                    </div><!--w50-->   
                    
                    <div class="porcento"> 
                        <input type="email" name="email" placeholder="E-mail"  value="<?php recoverPost('email'); ?>">
                        <small class="erro3" style="color: red; display: none">E-mail incorreto</small>
                    </div><!--w100-->  
                    
                    <div class="porcento">
                        <input type="password" name="senha" placeholder="Senha"  value="<?php recoverPost('senha'); ?>">
                        <small class="erro4" style="color: red; display: none;">Senha fraca, deve ter no mínimo 8 caracters e Coloque um caracter especial e uma letra Maiúscula</small>
                    </div><!--w100-->  

                    <div class="porcento">
                        <input type="text" name="telefone" id="telefone" placeholder="DD99999999"  value="<?php recoverPost('telefone'); ?>">
                        <small class="erro-telefone" style="color: red; display: none;">Telefone incorreto</small>
                    </div><!--w100-->  

                    <div class="porcento">
                        <h2>Data de Nascimento:</h2>
                        <select name="nascimento-dia" id="" class="nascimento">
                            <?php
                             for ($i = 1; $i <= 31; ++$i) {
                                 ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                        <small class="erro-dia" style="color: red; display: none;">Deve colocar o dia</small>
                        <select name="nascimento-mes" id="" class="nascimento">
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
                        <small class="erro-mes" style="color: red; display: none;">Deve colocar o mes</small>
                        <select name="nascimento-ano" class="nascimento">
                       
                        <?php
                            for ($ano = 1960; $ano <= 2024; ++$ano) {
                                ?>
                            <option value="<?php echo $ano; ?>"><?php echo $ano; ?></option>
                            <?php } ?>
                        </select>
                        <small class="erro-ano" style="color: red; display: none;">Deve colocar o ano</small>
                        <div class="clear"></div>
                    </div><!--w100-->
                    <div class="porcento">
                          <div class="input-radio">
                               <input type="radio" name="sexo" id="" value="masculino">
                               <h2>Masculino</h2>
                          </div><!--input-radio-->
                          <div class="input-radio">
                               <input type="radio" name="sexo" id="" value="Feminino">
                               <h2>Feminino</h2>
                          </div><!--input-radio-->
                          <div class="clear"></div>
                          <small class="erro5" style="color: red; display: none">Por favor informe o sexo</small>
                    </div><!--w100-->

                    <div class="porcento">
                    <h2>Objetivo:</h2>
                      <select name="objetivo" placeholder="Objetivo" id="" class="objetivo">
                          <option  value="selecione">Selecione:</option>
                          <option value="hipertrofia">Hipertrofia</option>
                          <option value="emagrecimento">Emagrecimento</option>
                          <option value="condicionamento">Condicionamento</option>
                      </select> 
                      <small class="erro6" style="color: red; display: none">Por favor informe o objetivo</small>             
                    </div><!--100-->
                        
                    <div class="porcento">
                          <input type="submit" name="acao" value="Cadastrar">
                    </div><!--w100-->

                    <div class="clear"></div>
                   </form><!--criar-conta-->
              </div><!--abrir-conta-->
             <div class="clear"></div> 
    </div>
    <div class="clear"></div>
    </div><!--center-->
</section><!--cadastro-cliente-->

<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/jquery.mask.js"></script>
<script>
    $('#telefone').mask("0000000000");
</script>
<?php

if (isset($_POST['acao'])) {
    $erro = 0;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $forca = 0;
    $nascimento_dia = $_POST['nascimento-dia'];
    $nascimento_mes = $_POST['nascimento-mes'];
    $nascimento_ano = $_POST['nascimento-ano'];
    $sexo = $_POST['sexo'];
    $objetivo = $_POST['objetivo'];
    $status = 'offline';
    $imagem = 'foto';
    $cargo = 1;
    $ativo = 1;

    $verifica_nome = preg_match('/[a-z]{3,}/', $nome);
    $regexTelefone = preg_match('/^[0-9]{10}$/', $telefone);

    if (!$verifica_nome) {
        echo "
        <script>
          $('.erro1').css('display', 'block');
        </script> ";
        $erro = 1;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "
        <script>
          $('.erro3').css('display', 'block');
        </script> ";
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
        echo "
        <script>
          $('.erro4').css('display', 'block');
        </script> ";
        $erro = 1;
    }

    if (!$regexTelefone) {
        echo "
        <script>
          $('.erro-telefone').css('display', 'block');
        </script> ";
        $erro = 1;
    }

    if ($nascimento_dia == '') {
        echo "
        <script>
          $('.erro-dia').css('display', 'block');
        </script> ";
        $erro = 1;
    } elseif ($nascimento_mes == '') {
        echo "
        <script>
          $('.erro-mes').css('display', 'block');
        </script> ";
        $erro = 1;
    } elseif ($nascimento_ano == '') {
        echo "
        <script>
          $('.erro-mes').css('display', 'block');
        </script> ";
        $erro = 1;
    } elseif ($sexo == '') {
        echo "
        <script>
          $('.erro5').css('display', 'block');
        </script> ";
        $erro = 1;
    } elseif ($objetivo == '' || $objetivo == 'selecione') {
        echo "
        <script>
          $('.erro6').css('display', 'block');
        </script> ";
        $erro = 1;
    }

     $senha_cri = password_hash($senha, PASSWORD_DEFAULT);

    if ($erro == 0) {
        $cadastro = new Cadastro();
        $cadastro->conferirEmail($nome, $email, $telefone, $senha_cri, $nascimento_dia, $nascimento_mes, $nascimento_ano, $sexo, $objetivo, $status, $imagem, $cargo, $ativo);
    }
}

                            ?>