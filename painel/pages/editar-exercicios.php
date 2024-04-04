<?php

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $exercicio = Painel::select('tb_musculos', 'id = ?', array($id));
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
            $exercicio = Painel::select('tb_musculos', 'id = ?', array($id));
        }else{
            Painel::alert('erro', 'Campo vazios não são permitidos');
        }
    }
        
        
    ?>

        <div class="form-group">
            <label for="peito">Peito:</label>
            <input type="text" id="peito" name="peito" value="<?php print($exercicio['peito']) ?>">
        </div><!--form-group-->
      
        <div class="form-group">
            <label for="costas">Costas:</label>          
            <input type="text" id="costas" name="costas"  value="<?php print($exercicio['costas']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="biceps">Biceps:</label>
            <input type="text" id="biceps" name="biceps"  value="<?php print($exercicio['biceps']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="triceps">Tríceps:</label>
            <input type="text" id="triceps" name="triceps"  value="<?php print($exercicio['triceps']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="ombro">Ombro:</label>
            <input type="text" id="ombro" name="ombro"  value="<?php print($exercicio['ombro']) ?>">
        </div><!--form-group-->


        <div class="form-group">
            <label for="quadriceps">Quadriceps:</label>
            <input type="text" id="quadriceps" name="quadriceps"  value="<?php print($exercicio['quadriceps']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="posterior_coxas">Posterios de coxas:</label>
            <input type="text" id="posterior_coxas" name="posterior_coxas"  value="<?php print($exercicio['posterior_coxas']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="pantorrilha">Pantorrilha:</label>
            <input type="text" id="pantorrilha" name="pantorrilha"  value="<?php print($exercicio['pantorrilha']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="trapezio">Trapézio:</label>
            <input type="text" id="trapezio" name="trapezio"  value="<?php print($exercicio['trapezio']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="gluteo">Glúteo:</label>
            <input type="text" id="gluteo" name="gluteo"  value="<?php print($exercicio['gluteo']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="cardio">Cardio:</label>
            <input type="text" id="cardio" name="cardio"  value="<?php print($exercicio['cardio']) ?>">
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="tb_musculos">
            <input type="submit" name="acao" value="Editar!">
        </div><!--form-group-->
    </form>
</div><!--box-content-->
