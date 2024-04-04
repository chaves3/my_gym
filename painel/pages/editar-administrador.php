<?php

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $administradoresSub = Painel::select('tb_clientes', 'id = ?', array($id));
}else{
    Painel::alert('erro', 'Você precisa passar o ID');
    die();
}

?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="box-content">
    <h2><i class="bi bi-pen-fill"></i>Editar exercícios</h2>
    <form action="" method="post" enctype="multipart/form-data">

    <?php
    if (isset($_POST['acao'])) {
           if(Painel::update($_POST)){
            Painel::alert('sucesso', 'A edição Foi realizado com sucesso');
            $administradoresSub = Painel::select('tb_clientes', 'id = ?', array($id));
        }else{
            Painel::alert('erro', 'Campo vazios não são permitidos');
        }
    }
        
        
    ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php print($administradoresSub['nome']) ?>">
        </div><!--form-group-->
      

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email"  value="<?php print($administradoresSub['email']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone"  value="<?php print($administradoresSub['telefone']) ?>">
        </div><!--form-group-->
    
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="tb_clientes">
            <input type="submit" name="acao" value="Editar!">
        </div><!--form-group-->
    </form>
</div><!--box-content-->
