<?php 

include('./php/verificar_login.php');
include('./php/dashboard.php');
include('./php/dados.php');

$anonimo = $_SESSION['usuario'];
$conteudo = $_SESSION['conteudo'];

$conexao =  connect();

$query = "select titulo, dados from conteudo_arquivo  where user_id = '{$conteudo}'";

$result = mysqli_query($conexao, $query);
$rows = mysqli_fetch_array($result);

$metricas = colunas($rows['dados'], 'metrica');

$dimensoes = colunas($rows['dados'], 'dimensao');

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
        <form action="#" id="formulario">
          <label class="space"><?php $titulo = explode('.',$rows['titulo']); echo $titulo[0]; ?></label> <!-- aqui será adicionado via php o nome do arquivo-->
            <select class="space" id="exampleFormControlSelect1"><!-- aqui será adicionado via php o nome das colunas que são texto-->
              <?php 
              foreach ($dimensoes as $dimensao)
              {
                echo "<option> $dimensao </option>";
              }

              ?>
            </select>
            <select class="space" id="exampleFormControlSelect1"><!-- aqui será adicionado via php o nome das colunas que são números-->
              <?php 
              foreach ($metricas as $metrica)
              {
                echo "<option> $metrica </option>";
              }

              ?>
              <option>aqui coluna de numero</option>
              <option>aqui coluna de numero 2</option>
              <option>aqui coluna de numero 3</option>
              <option>aqui coluna de numero 4</option>
              <option>aqui coluna de numero 5</option>
            </select>
          <input type="submit" name="gerar" value="Gerar" class="space">
        </form>
      </div>
    </div>

      <!-- BODY - GRAFICOS -->
        <section class="flex">
          <div class="color">
            <canvas id="myChartLine"></canvas>
            <script type="text/javascript" src="./javascript/dashboard_graficos.js"></script>
          </div>
          <div>
            <canvas id="myChartBarra"></canvas>
            <script type="text/javascript" src="./javascript/dashboard_graficos.js"></script>
          </div>
          <div>
            <canvas id="myChartRadar"></canvas>
            <script type="text/javascript" src="./javascript/dashboard_graficos.js"></script>
          </div>
          <div>
            <canvas id="myChartPie"></canvas>
            <script type="text/javascript" src="./javascript/dashboard_graficos.js"></script>
          </div>
          <div>
            <canvas id="myChartPolarArea"></canvas>
            <script type="text/javascript" src="./javascript/dashboard_graficos.js"></script>
          </div>
          <div>
            <canvas id="myChartLine2"></canvas>
            <script type="text/javascript" src="./javascript/dashboard_graficos.js"></script>
          </div>

</body>
</html>