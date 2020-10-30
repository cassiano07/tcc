<?php 

include('./php/verificar_login.php');
include('./php/dashboard.php');
include('./php/dados.php');

$anonimo = $_SESSION['usuario'];
$conteudo = $_SESSION['conteudo'];

$conexao =  connect();
$grafico  = '';

$query = "select titulo, dados from conteudo_arquivo  where usuario_id = '{$conteudo}'";

$result = mysqli_query($conexao, $query);
$rows = mysqli_fetch_array($result);

$metricas = colunas($rows['dados'], 'metrica');

$dimensoes = colunas($rows['dados'], 'dimensao');

$dimensao = ( isset($_POST['dimensao']) ) ? $_POST['dimensao'] : null;
$metrica = ( isset($_POST['metrica']) ) ? $_POST['metrica'] : null;
$operacao = ( isset($_POST['operacao']) ) ? $_POST['operacao'] : null;
$conteudo = ( isset($_POST['conteudo']) ) ? $_POST['conteudo'] : null;

$dimensao_values = '';
$metrica_values = '';


if($dimensao != null || $metrica != null || $operacao != null || $conteudo != null)
{
	$dimensao_values = dados($conteudo, $dimensao, $metrica, $operacao, 'dimensao');
  $metrica_values = dados($conteudo, $dimensao, $metrica, $operacao, 'metrica');
}

$create_variable = "<script> 
            var dimensao = '".json_encode($dimensao_values)."';
            var metrica = '".json_encode($metrica_values)."';
            var nome_metrica = '".$metrica."';
            var nome_dimensao = '".$dimensao."';
            var dimensao_json =JSON.parse(dimensao);
            var metrica_json =JSON.parse(metrica);
            dimensao_array = Array.from(dimensao_json);
            metrica_array = Array.from(metrica_json);
          </script>";

echo $create_variable;


  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Dashbord</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="./css/dashbord.css">
  <link rel="stylesheet" type="text/css" href="./css/menu.css">
  <link rel="stylesheet" type="text/css" href="./css/graficos.css">
  <link rel="stylesheet" type="text/css" href="./css/style_dashbord.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./javascript/dashboard_graficos.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- MENU -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- MENU -->

</head>
<body>
  <!-- MENU -->
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
    </label>

    <label class="logo"><img src="./img/logo.png"  width="100" height="80"></label>
    <ul>
      <li><a class="active" href="#"><?php $usuario = explode("@",$_SESSION['usuario']); echo $usuario[0];?></a></li>
      <li><?php  echo $anonimo == 'anonimo' ? '<a href="#">' : '<a href="./favoritos.php">';?>FAVORITOS</a></li>
      <li><?php  echo $anonimo == 'anonimo' ? '<a href="#">' : '<a href="./historico.php">';?>HISTÓRICO</a></li>
      <li><a href="./php/logout.php">LOGOUT</a></li>
    </ul>
  </nav>

  <!-- Conteudo-->
  
    <div id="select">
      <div id="name_project">
        <p>Dashboard</p>
      </div>

      <div id="alinha">
        <form action="./dashbord.php" method="post" id="formulario">
          <label class="space"><?php $titulo = explode('.',$rows['titulo']); echo $titulo[0]; ?></label> <!-- aqui será adicionado via php o nome do arquivo-->
            <select class="space"  name="dimensao" id="exampleFormControlSelect1"><!-- aqui será adicionado via php o nome das colunas que são texto-->
              <?php
              foreach ($dimensoes as $dimensao)
              {
                echo '<option value="'.$dimensao.'">'.$dimensao.'</option>';
              }
              ?>
            </select>
            <select class="space" name="metrica" id="exampleFormControlSelect1"><!-- aqui será adicionado via php o nome das colunas que são números-->
              <?php
              foreach ($metricas as $metrica)
              {
                echo '<option value="'.$metrica.'">'.$metrica.'</option>';
              }

              ?>
            </select>
            <select class="space" name="operacao" id="exampleFormControlSelect1"><!-- aqui será adicionado via php o nome das colunas que são números-->
               <option value="soma"> Soma </option>
               <option value="multiplicacao"> Multiplicação </option>
               <option value="contagem"> Contagem </option>
               <option value="nenhum"> Nenhum </option>
            </select>
            <input type="hidden" name="conteudo" <?php echo'value="'.$rows['dados'].'"'?> >
          <input type="submit" name="gerar" value="Gerar" class="space">
        </form>
      </div>
    </div>


      <!-- BODY - GRAFICOS -->            
    <section class="flex">
      <div class="color">
        <canvas id="myChartLine"></canvas>
        <script type="text/javascript"> alert(dimensao_array); line(dimensao_array, metrica_array, nome_dimensao);</script>
      </div>
      <div>
        <canvas id="myChartBarra"></canvas>
        <script type="text/javascript"> bar(dimensao_array, metrica_array, nome_dimensao);</script>
      </div>
      <div>
        <canvas id="myChartRadar"></canvas>
        <script type="text/javascript"> radar(dimensao_array, metrica_array, nome_dimensao);</script>
      </div>
      <div>
        <canvas id="myChartPie"></canvas>
        <script type="text/javascript"> pie(dimensao_array, metrica_array, nome_dimensao);</script>
      </div>
      <div>
        <canvas id="myChartPolarArea"></canvas>
        <script type="text/javascript"> polarArea(dimensao_array, metrica_array, nome_dimensao);</script>
      </div>
      <div>
        <canvas id="myChartLine2"></canvas>
        <script type="text/javascript"> lineSimple(dimensao_array, metrica_array, nome_dimensao);</script>
      </div>
    </section>

</body>
</html>