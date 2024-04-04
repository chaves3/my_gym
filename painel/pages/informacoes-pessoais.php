<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="box-content">
    <h2><i class="bi bi-pen-fill"></i> Editar Usuário</h2>
    
    <form action="" method="post" enctype="multipart/form-data">

    <?php
        if (isset($_POST['acao'])) {
            // Atualizei meu formulário
            $erro = 0;
            $forca = 0;
            $nome = $_POST['nome'];
            $senha = $_POST['senha'];
            $telefone = $_POST['telefone'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];

            

            $verifica_nome = preg_match('/[a-z]{3,}/', $nome);
            $regexTelefone = preg_match('/^[0-9]{10}$/', $telefone);

            if (!$verifica_nome) {
                Painel::alert('erro', 'Nome Inválido');
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

            if(!$regexTelefone){
                Painel::alert('erro', 'Telefone incorreto');
                $erro = 1;
            }

            $senha_cri = password_hash($senha, PASSWORD_DEFAULT);

            if($erro == 0){

            $usuario = new Usuario();

            if ($imagem['name'] != '') {
                Painel::deleteFile($imagem_atual);
                // Existe o upload da imagem
                if(Painel::imagemValida($imagem)){
                    $imagem = Painel::uploadFile($imagem);
                    if($usuario->atualizarUsuario($nome, $senha_cri, $telefone, $imagem)){
                        $_SESSION['foto'] = $imagem;
                        Painel::alert('sucesso', 'Atualização realizada com sucesso junto com a imagem');
                    }else{
                        Painel::alert('erro', 'Ocorreu erro ao atualizar com a imagem..');
                    }
                }else{
                    Painel::alert('erro', 'O formato da imagem não é válido');
                }
            } else {
                $imagem = $imagem_atual;
                if ($usuario->atualizarUsuario($nome, $senha_cri, $telefone, $imagem)) {
                    Painel::alert('sucesso', 'Atualização realizada com sucesso');
                } else {
                    Painel::alert('erro', 'Ocorreu erro ao atualizar..');
                }
            }
        }
    }
    ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
        </div><!--form-group-->
        
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required value="<?php echo $_SESSION['senha']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="telefone">telefone:</label>
            <input type="text" id="telefone" name="telefone" required value="<?php echo $_SESSION['telefone']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem">
            <input type="hidden" id="imagem_atual" name="imagem_atual" value="<?php echo $_SESSION['foto']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form-group-->
    </form>

<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/jquery.js"></script> 
</div><!--box-content-->
