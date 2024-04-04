<?php
$pegarclienteTotais = MySql::conectar()->prepare('SELECT * FROM `tb_clientes` ');
$pegarclienteTotais->execute();
$pegarclienteTotais = $pegarclienteTotais->fetchAll();

$totalClientes = MySql::conectar()->prepare('SELECT * FROM `tb_clientes` ');
$totalClientes->execute();
$totalClientes = $totalClientes->rowCount();

$clientesOnline = MySql::conectar()->prepare("SELECT * FROM `tb_clientes` WHERE status = 'online' ");
$clientesOnline->execute();
$clientesOnline = $clientesOnline->rowCount();

$usuariosOnline = Painel::listarUsuariosOnline();
$pegarvisitasTotais = MySql::conectar()->prepare('SELECT * FROM `tb_visitas` ');
$pegarvisitasTotais->execute();
$pegarvisitasTotais = $pegarvisitasTotais->rowCount();

// Paginação

$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$porPagina = 3;

$clientesPaginas = Painel::selectAllCargo('tb_clientes', ($paginaAtual - 1) * $porPagina, $porPagina);

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php if($_SESSION['cargo'] != 1){   ?>
<div class="box-content  w100">
    <h2><i class="fa-solid fa-house"></i> Painel de Controler - <?php echo NOME_EMPRESA; ?></h2>
    <div class="metricas">
     <div class="box-metrica-single">
        <div class="box-metrica-wraper">
            <h2>Total de Clientes</h2>
            <p><?php echo $totalClientes; ?></p>
        </div><!--metrica-wraper-->
     </div><!--metrica-single-->

     <div class="box-metrica-single">
        <div class="box-metrica-wraper">
            <h2>Clientes Online</h2>
            <p><?php echo $clientesOnline; ?></p>
        </div><!--metrica-wraper-->
     </div><!--metrica-single-->

     <div class="box-metrica-single">
        <div class="box-metrica-wraper">
            <h2>Total de visitas</h2>
            <p><?php echo $pegarvisitasTotais; ?></p>
        </div><!--metrica-wraper-->
     </div><!--metrica-single-->
     <div class="clear"></div>
     </div><!--METRICAS-->
  </div><!--box-content-->          
<?php } ?>

<?php

if($_SESSION['cargo'] == 1){
$meusExercicios = MySql::conectar()->prepare("SELECT * FROM clientes_exercicios WHERE id_cliente = ?");
$meusExercicios->execute(array($_SESSION['id']));
$meusExercicios = $meusExercicios->fetchAll();

$sql5 = MySql::conectar()->prepare('SELECT * FROM colors');
$sql5->execute();
$colors = $sql5->fetch();



?>

<div class="box-content  w100">
<h2>Meus exercícios</h2>
<br><br>
<i class="bi bi-clipboard-check-fill"></i>
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
         foreach ($meusExercicios as $key => $value) {
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
'   </div><!--box-content-->
    <?php } ?>
  
 <?php if($_SESSION['cargo'] != 1){   ?>
 
  <div class="box-content  w100">
    <h2><i class="bi bi-collection"></i> Clientes Cadastrados - <?php ?></h2>

      <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>E-MAIL:</span>
            </div><!--col-->
            <div class="col">
                <span>NOME:</span>
            </div><!--col-->
            <div class="col">
                <span>EDITAR:</span>
            </div><!--col-->
            
            <div class="clear"></div>
        </div><!--row-->
        
        
        <?php foreach ($clientesPaginas as $key) { ?>
        <div class="row">
            <div class="col">
                <span><?php echo $key['email']; ?></span>
            </div><!--col-->
            <div class="col">
                <span><?php echo $key['nome']; ?></span>
            </div><!--col-->
            <div class="col">
                <button class="editar-btn-cliente"><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente?id=<?php echo $key['id']; ?>">EDITAR</a></button>
            </div><!--col-->
            <?php
            $idclienteUpdate = $key['id'];
            $nomeCliente = $key['nome'];
            $ativoId = $key['ativo'];
                    
            ?>
            <div class="col">

            <?php
               
               if($ativoId == 1){
            ?>
                 <form action="" method="post">
                    <input type="submit" class="editar-btn-cliente" name="ativar-btn" value="Ativar!">
                 </form>
                 <?php 
                    if(isset($_POST['ativar-btn'])){
                       $ativarCliente = MySql::conectar()->prepare("INSERT INTO clientes_exercicios (
                        nome_cliente, peito, costas, biceps, triceps, ombro, quadriceps, posterior_coxas,
                        pantorrilha, trapezio, gluteo, cardio, abidominal, id_cliente) VALUES (
                          ?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $ativarCliente->execute(array($nomeCliente,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ', $idclienteUpdate));
                        
                        $mudarAtivo = MySql::conectar()->prepare("UPDATE `tb_clientes` SET ativo = ? WHERE id = ?");
                        $mudarAtivo->execute(array(2, $idclienteUpdate));
                        Painel::alert('sucesso', 'Cliente Ativado com sucesso');
                    }

                }
                 ?>
                
            </div><!--col-->
            <div class="clear"></div> 
            <?php } ?>
          
        </div><!--row-->
        <?php } ?>
        
        
        
        <div class="paginacao">
        <?php if($_SESSION['cargo'] != 1){   ?>
      <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_clientes'))) / $porPagina;

            for ($i = 1; $i <= $totalPaginas; ++$i) {
              if ($i == $paginaAtual) {
                  echo "<a class='page-selected' href='".INCLUDE_PATH_PAINEL."home?pagina=$i'>$i</a>";
              } else {
                  echo "<a  href='".INCLUDE_PATH_PAINEL."home?pagina=$i'>$i</a>";
              }
          }
      ?>
    </div><!--paginacao-->
    </div><!--table-responsive-->
  </div><!--box-content-->  
  <?php } ?>
  
<br><br>

<div class="box-content">
<?php if($_SESSION['cargo'] != 1){   

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';
$pesquisa = MySql::conectar()->prepare("SELECT * FROM tb_clientes WHERE nome LIKE '%$filtro%' AND cargo = 1 ORDER BY nome ASC");
$pesquisa->execute();
$pesquisa = $pesquisa->fetchAll();
?>

 <form method="GET" action="">
    <input type="text" name="filtro" required autofocus>
    <input type="submit" value="Pesquisar" class="btn btn-success text-dark">
 </form>

 <h2>Meus Clíentes</h2>

 <h5><?php echo "Resultado da Pesquisa  <strong>$filtro</strong><br><br>"; ?></h5>

<i class="bi bi-clipboard-check-fill"></i>
<div class="wraper-table">
    <table>
        <tr>
            <td>E-MAIL</td>
            <td>NOME</td>
            <td>TELEFONE</td>
            <td>EDITAR</td>
        </tr>

        <?php
         foreach ($pesquisa as $key => $valuePesq) {
             ?>
        <tr>
            <td>
                <?php echo $valuePesq['email']; ?>
            </td>
            
            <td>
            <?php echo $valuePesq['nome']; ?>
            </td>
            <td>
            <?php echo $valuePesq['telefone']; ?>
            </td>
            <td>
             <button class="editar-btn-cliente"><a href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente?id=<?php echo $valuePesq['id']; ?>">EDITAR</a></button>
             <?php
            $idclienteUpdate = $valuePesq['id'];
            $nomeCliente = $valuePesq['nome'];
            $ativoId = $valuePesq['ativo'];
                    
            ?>
        

            <?php
               
               if($ativoId == 1){
            ?>
                 <form action="" method="post">
                    <input type="submit" class="editar-btn-cliente" name="ativar-btn" value="Ativar!">
                 </form>
                 <?php 
                    if(isset($_POST['ativar-btn'])){
                       $ativarCliente = MySql::conectar()->prepare("INSERT INTO clientes_exercicios (
                        nome_cliente, peito, costas, biceps, triceps, ombro, quadriceps, posterior_coxas,
                        pantorrilha, trapezio, gluteo, cardio, abidominal, id_cliente) VALUES (
                          ?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $ativarCliente->execute(array($nomeCliente,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ', $idclienteUpdate));
                        
                        $mudarAtivo = MySql::conectar()->prepare("UPDATE `tb_clientes` SET ativo = ? WHERE id = ?");
                        $mudarAtivo->execute(array(2, $idclienteUpdate));
                        Painel::alert('sucesso', 'Cliente Ativado com sucesso');
                    }

                }
                 ?>
                
            </td>
        </tr>
    <?php } ?>

    </table>
    </div><!--wraper-table-->


<?php } ?>  
</div><!--box-content-->




  <div class="box-content  w100">
  <?php if($_SESSION['cargo'] != 1){   ?>
   <?php

    $x = 0;
    $y = 0;

    $sexoClientes = MySql::conectar()->prepare('SELECT * FROM `tb_clientes` ');
    $sexoClientes->execute();
    $sexoClientes = $sexoClientes->fetchAll();

foreach ($sexoClientes as $key => $value) {
    if ($value['sexo'] == 'masculino') {
        ++$x;
    } elseif ($value['sexo'] == 'Feminino') {
        ++$y;
    }
}
?>
   
   <?php
  echo "
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type='text/javascript'>
      google.charts.load('current', {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Hours per Day'],
          ['Homens',     $x],
          ['Mulheres',      $y],
        ]);

        var options = {
          title: 'Sexo',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <div id='piechart_3d' style='width: 900px; height: 500px;'></div>
     ";

?> 

  </div><!--box-content-->  

  <?php } ?>
 


                

 

