<?php

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = MySql::conectar()->prepare('SELECT * FROM clientes_exercicios WHERE id_cliente = ?');
    $sql->execute([$id]);
    $exercicos_clientes = $sql->fetchAll();
} else {
    Painel::alert('erro', 'Você precisa passar o ID');
    exit;
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="box-content w100">

<button style="cursor: pointer;" class="editar-btn-cliente btn-edi">Editar</button>
<br><br>

<div class="cadastro2" style="display: none;">
<h2>Editar exercícios</h2>
<br>
<i style="cursor: pointer;" class="bi bi-x-circle-fill icn"></i>

<?php

   foreach ($exercicos_clientes as $key => $value) {
   }
?>

<form action="" method="post">

<?php
      if (isset($_POST['acao2'])) {
          $idedit = $_POST['id'];
          $nome_cliente = $_POST['nome_cliente'];
          $peito = $_POST['peito'];
          $costas = $_POST['costas'];
          $biceps = $_POST['biceps'];
          $triceps = $_POST['triceps'];
          $ombro = $_POST['ombro'];
          $quadriceps = $_POST['quadriceps'];
          $posterior_coxas = $_POST['posterior_coxas'];
          $pantorrilha = $_POST['pantorrilha'];
          $trapezio = $_POST['trapezio'];
          $gluteo = $_POST['gluteo'];
          $cardio = $_POST['cardio'];
          $abidominal = $_POST['abidominal'];
          $id = $_POST['id_cliente'];

          $sql2 = MySql::conectar()->prepare('UPDATE clientes_exercicios SET nome_cliente = ?, peito = ?,
        costas = ?, biceps = ?, triceps = ?, ombro = ?, quadriceps = ?, posterior_coxas = ?,
        pantorrilha = ?, trapezio = ?, gluteo = ?, cardio = ?, abidominal = ? WHERE id_cliente = ?');
          $sql2->execute([$nome_cliente, $peito, $costas, $biceps, $triceps, $ombro, $quadriceps, $posterior_coxas, $pantorrilha, $trapezio, $gluteo, $cardio, $abidominal, $id]);
          Painel::alert('sucesso', 'Editado com sucesso');
      }

?>

      <div class="form-group">
         <label for="nome_cliente"></label>
         <input type="text" name="nome_cliente" id="nome_cliente" value="<?php echo $value['nome_cliente']; ?>">
      </div><!--form-group-->

        <div class="form-group">
            <label for="peito">Peito:</label>
               <input type="text" name="peito" id="peito" value="<?php echo $value['peito']; ?>">
        </div><!--form-group-->
      
        <div class="form-group">
            <label for="costas">Costas:</label>
               <input type="text" name="costas" id="costas" value="<?php echo $value['costas']; ?>">
        </div><!--form-group-->


        <div class="form-group">
            <label for="biceps">Biceps:</label>
               <input type="text" name="biceps" id="biceps"  value="<?php echo $value['biceps']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="triceps">Triceps:</label>
               <input type="text" name="triceps" id="triceps" value="<?php echo $value['triceps']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="ombro">Ombro:</label>
               <input type="text" name="ombro" id="ombro" value="<?php echo $value['ombro']; ?>">
        </div><!--form-group-->


        <div class="form-group">
            <label for="quadriceps">Quadriceps:</label>
               <input type="text" name="quadriceps" id="quadriceps" value="<?php echo $value['quadriceps']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="posterior_coxas">posterior_coxas:</label>
               <input type="text" name="posterior_coxas" id="posterior_coxas" value="<?php echo $value['posterior_coxas']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="pantorrilha">Pantorrilha:</label>
               <input type="text" name="pantorrilha" id="pantorrilha" value="<?php echo $value['pantorrilha']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="trapezio">Trapézio:</label>
               <input type="text" name="trapezio" id="trapezio" value="<?php echo $value['trapezio']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="gluteo">Glúteo:</label>
               <input type="text" name="gluteo" id="gluteo" value="<?php echo $value['gluteo']; ?>">
        </div><!--form-group-->
       
        <div class="form-group">
            <label for="cardio">Cardio:</label>
               <input type="text" name="cardio" id="cardio" value="<?php echo $value['cardio']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label for="abidominal">Abidominal:</label>
               <input type="text" name="abidominal" id="abidominal" value="<?php echo $value['abidominal']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <input type="hidden" name="id_cliente" value="<?php echo $id; ?>">
            <input type="hidden" name="id" value="<?php echo $idedit; ?>">
            <input type="submit" name="acao2" value="Atualizar!">
        </div><!--form-group-->
</form>
</div><!--cadastro-->

</div><!--box-content-->

<?php

$conferirColors = MySql::conectar()->prepare("SELECT * FROM colors WHERE id_cor_cliente = ?");
$conferirColors->execute(array($id));
$conferirColors = $conferirColors->fetchAll();

foreach ($conferirColors as $key) {
        $idCor = $key['id_cor_cliente'];
        
}

if(!isset($idCor)){ 


//if($idCor != $id){?>

<div class="box-content">
<button style="cursor: pointer;" class="editar-btn-cliente cores-btn">Primeira Combinação</button>
<div class="cores-exerc" style="display: none;">
<br><br>
<i style="cursor: pointer;" class="bi bi-x-circle-fill icn2"></i>
<form action="" method="post">
    <h2>Peito:</h2>
        <select name="peito3" id="peito3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
      <br><br>
        <h2>Costas:</h2>
        <select name="costas3" id="costas3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Biceps:</h2>
        <select name="biceps3" id="biceps3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Triceps:</h2>
        <select name="triceps3" id="triceps3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Ombro:</h2>
        <select name="ombro3" id="ombro3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Quadriceps:</h2>
        <select name="quadriceps3" id="quadriceps3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Posterior de coxas:</h2>
        <select name="posteriordecoxas3" id="posteriordecoxas3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Pantorrilha:</h2>
        <select name="pantorrilha3" id="pantorrilha3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Trapézio:</h2>
         <select name="trapezio3" id="trapezio3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Glúteo:</h2>
        <select name="gluteo3" id="gluteo3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Cardio:</h2>
        <select name="cardio3" id="cardio3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Abidominal:</h2>
        <select name="abidominal3" id="abidominal3">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->

    <div class="form-group">
        <input type="submit" value="Adicionar" name="acao4">
    </div>
</form>
</div><!--cores-exercicios-->

<?php
 if (isset($_POST['acao4'])) {
     $peito3 = $_POST['peito3'];
     $costas3 = $_POST['costas3'];
     $biceps3 = $_POST['biceps3'];
     $triceps3 = $_POST['triceps3'];
     $ombro3 = $_POST['ombro3'];
     $quadriceps3 = $_POST['quadriceps3'];
     $posteriordecoxas3 = $_POST['posteriordecoxas3'];
     $pantorrilha3 = $_POST['pantorrilha3'];
     $trapezio3 = $_POST['trapezio3'];
     $gluteo3 = $_POST['gluteo3'];
     $cardio3 = $_POST['cardio3'];
     $abidominal3 = $_POST['abidominal3'];

     $sql6 = MySql::conectar()->prepare("INSERT INTO colors (id_cor_cliente, cor1, cor2, cor3, cor4, cor5, cor6, cor7, cor8, cor9, cor10, cor11, cor12) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
     $sql6->execute([$id, $peito3, $costas3, $biceps3, $triceps3, $ombro3, $quadriceps3, $posteriordecoxas3, $pantorrilha3, $trapezio3, $gluteo3, $cardio3, $abidominal3]);
 }

?>

<?php
}else{
?>
<br><br>
<div class="box-content">
<button style="cursor: pointer;" class="editar-btn-cliente cores-btn">Combinação</button>
<div class="cores-exerc" style="display: none;">
<br><br>
<i style="cursor: pointer;" class="bi bi-x-circle-fill icn2"></i>
<form action="" method="post">
    <h2>Peito:</h2>
        <select name="peito2" id="peito2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
      <br><br>
        <h2>Costas:</h2>
        <select name="costas2" id="costas2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Biceps:</h2>
        <select name="biceps2" id="biceps2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Triceps:</h2>
        <select name="triceps2" id="triceps2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Ombro:</h2>
        <select name="ombro2" id="ombro2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Quadriceps:</h2>
        <select name="quadriceps2" id="quadriceps2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Posterior de coxas:</h2>
        <select name="posteriordecoxas" id="posteriordecoxas">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Pantorrilha:</h2>
        <select name="pantorrilha2" id="pantorrilha2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Trapézio:</h2>
         <select name="trapezio2" id="trapezio2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Glúteo:</h2>
        <select name="gluteo2" id="gluteo2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Cardio:</h2>
        <select name="cardio2" id="cardio2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->
    <br><br>
        <h2>Abidominal:</h2>
        <select name="abidominal2" id="abidominal2">
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="orange">Laranja</option>
        <option value="yellow">Amarelo</option>
    </select><!--cor-peito-->

    <div class="form-group">
        <input type="submit" value="Adicionar" name="acao3">
    </div>
</form>
</div><!--cores-exercicios-->

<?php
 if (isset($_POST['acao3'])) {
     $peito2 = $_POST['peito2'];
     $costas2 = $_POST['costas2'];
     $biceps2 = $_POST['biceps2'];
     $triceps2 = $_POST['triceps2'];
     $ombro2 = $_POST['ombro2'];
     $quadriceps2 = $_POST['quadriceps2'];
     $posteriordecoxas = $_POST['posteriordecoxas'];
     $pantorrilha2 = $_POST['pantorrilha2'];
     $trapezio2 = $_POST['trapezio2'];
     $gluteo2 = $_POST['gluteo2'];
     $cardio2 = $_POST['cardio2'];
     $abidominal2 = $_POST['abidominal2'];

     $sql4 = MySql::conectar()->prepare('UPDATE colors SET cor1 = ?, cor2 = ?, cor3 = ?, cor4 = ?, cor5 = ?, cor6 = ?,  cor7 = ?, cor8 = ?, cor9 = ?, cor10 = ?, cor11 = ?, cor12 = ? WHERE id_cor_cliente = ?');
     $sql4->execute([$peito2, $costas2, $biceps2, $triceps2, $ombro2, $quadriceps2, $posteriordecoxas, $pantorrilha2, $trapezio2, $gluteo2, $cardio2, $abidominal2, $id]);
 }

$sql5 = MySql::conectar()->prepare('SELECT * FROM colors WHERE id_cor_cliente = ?');
$sql5->execute(array($id));
$colors = $sql5->fetch();
?>

<?php } ?>

<button style="cursor: pointer;" class="editar-btn-cliente exercs-cliente">Ordem</button>
<br><br>

<div class="lista-exercicios-cliente" style="display: none;">
<h2>Ordem exercícios</h2>
<br><br>
<i style="cursor: pointer;" class="bi bi-x-circle-fill icn3"></i>
<div class="wraper-table">
    <table>
        <tr>
            <td>Peito</td>
            <td>Costas</td>
            <td>Biceps</td>
            <td>Triceps</td>
            <td>Ombro</td>
            <td>Quadriceps</td>
            <td>Posterior de coxas</td>
            <td>Pantorrilha</td>
            <td>Trapézio</td>
            <td>Glúteo</td>
            <td>Cardio</td>
            <td>Abidominal</td>
        </tr>

        <?php
         foreach ($exercicos_clientes as $key => $value) {
             ?>
        <tr>
            <td style="color: <?php echo $colors['cor1']; ?>;">
                <?php echo $value['peito']; ?>
            </td>
            
            <td style="color: <?php echo $colors['cor2']; ?>;"><?php echo $value['costas']; ?></td>
            <td style="color: <?php echo $colors['cor3']; ?>;"><?php echo $value['biceps']; ?></td>
            <td style="color: <?php echo $colors['cor4']; ?>;"><?php echo $value['triceps']; ?></td>
            <td style="color: <?php echo $colors['cor5']; ?>;"><?php echo $value['ombro']; ?></td>
            <td style="color: <?php echo $colors['cor6']; ?>;"><?php echo $value['quadriceps']; ?></td>
            <td style="color: <?php echo $colors['cor7']; ?>;"><?php echo $value['posterior_coxas']; ?></td>
            <td style="color: <?php echo $colors['cor8']; ?>;"><?php echo $value['pantorrilha']; ?></td>
            <td style="color: <?php echo $colors['cor9']; ?>;"><?php echo $value['trapezio']; ?></td>
            <td style="color: <?php echo $colors['cor10']; ?>;"><?php echo $value['gluteo']; ?></td>
            <td style="color: <?php echo $colors['cor11']; ?>;"><?php echo $value['cardio']; ?></td>
            <td style="color: <?php echo $colors['cor12']; ?>;"><?php echo $value['abidominal']; ?></td>
        </tr>
    <?php } ?>

    </table>
    </div><!--wraper-table-->
    </div><!--clientes-exercicios-->
</div><!--box-content-->