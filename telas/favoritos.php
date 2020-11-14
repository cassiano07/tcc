<?php 

include('./php/verificar_login.php');
include('./php/dashboard.php');
include('./php/dados.php');
include('./php/processa_favoritos.php');

$anonimo = '';

if(isset($_SESSION['usuario']) AND isset($_SESSION['conteudo']))
{
  $anonimo = $_SESSION['usuario'];
  $conteudo = $_SESSION['conteudo'];
}

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
      <li><a class="active" href="./dashbord.php"><?php $usuario = explode("@",$_SESSION['usuario']); echo $usuario[0];?></a></li>
      <li><?php  echo $anonimo == 'anonimo' ? '<a href="#">' : '<a href="./favoritos.php">';?>FAVORITOS</a></li>
      <li><?php  echo $anonimo == 'anonimo' ? '<a href="#">' : '<a href="./historico.php">';?>HISTÓRICO</a></li>
      <li><a href="../index.html">ARQUIVO</a></li>
      <li><a href="./php/logout.php">LOGOUT</a></li>
    </ul>
  </nav>

  <!-- Conteudo-->
  
    <div id="select">
      <div id="name_project">
        <p>Favoritos</p>
      </div>
    </div>


<?php 
  $dimensao_values = '';
  $metrica_values = '';

  $dados = conteudo($_SESSION['usuario_id']);

  echo '<section class="flex">';
  foreach($dados as $dado)
  {
    $metrica = $dado[2];
    $dimensao = $dado[1];
    $dimensao_values = dados($dado[0], $dado[1], $dado[2], $dado[3], 'dimensao');
    $metrica_values = dados($dado[0], $dado[1], $dado[2], $dado[3], 'metrica');

    $dimensao_values  = str_replace("\t", ' ', $dimensao_values);
    $dimensao_values  = str_replace("'", '',$dimensao_values);

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

    switch($dado[4])
    {
        case 1:
          echo 
          '
            <div>
              <canvas id="myChartLine"></canvas>
              <script type="text/javascript"> line(dimensao_array, metrica_array, nome_dimensao);</script>
              <div class="legenda">
                <div class="favorito" onclick="ApagarFavorito('.$dado[4].','.$dado[5].', \''.$dado[1].'\', \''.$dado[2].'\', \''.$dado[3].'\', '.$_SESSION['usuario_id'].')">
                  <img src="./img/favorito.png"></img>
                </div>
                <div class="download" id="d1" onclick="downloadImage(1,\''.$_SESSION['usuario'].'\')">
                  <img src="./img/download.png"></img>
                </div>
              </div>
            </div>
          ';
          break;
        case 2:
          echo 
          '
            <div>
              <canvas id="myChartBarra"></canvas>
              <script type="text/javascript"> bar(dimensao_array, metrica_array, nome_dimensao);</script>
              <div class="legenda">
                <div class="favorito" onclick="ApagarFavorito('.$dado[4].','.$dado[5].', \''.$dado[1].'\', \''.$dado[2].'\', \''.$dado[3].'\', '.$_SESSION['usuario_id'].')">
                  <img src="./img/favorito.png"></img>
                </div>
                <div class="download" id="d2" onclick="downloadImage(2,\''.$_SESSION['usuario'].'\')">
                  <img src="./img/download.png"></img>
                </div>
              </div>
            </div>
          ';
          break;
        case 3:
          echo 
          '
            <div>
              <canvas id="myChartRadar"></canvas>
              <script type="text/javascript"> radar(dimensao_array, metrica_array, nome_dimensao);</script>
              <div class="legenda">
                <div class="favorito" onclick="ApagarFavorito('.$dado[4].','.$dado[5].', \''.$dado[1].'\', \''.$dado[2].'\', \''.$dado[3].'\', '.$_SESSION['usuario_id'].')">
                  <img src="./img/favorito.png"></img>
                </div>
                <div class="download" id="d3" onclick="downloadImage(3,\''.$_SESSION['usuario'].'\')">
                  <img src="./img/download.png"></img>
                </div>
              </div>
            </div>
          ';
          break;
        case 4:
          echo 
          '
            <div>
              <canvas id="myChartPie"></canvas>
              <script type="text/javascript"> pie(dimensao_array, metrica_array, nome_dimensao);</script>
              <div class="legenda">
                <div class="favorito" onclick="ApagarFavorito('.$dado[4].','.$dado[5].', \''.$dado[1].'\', \''.$dado[2].'\', \''.$dado[3].'\', '.$_SESSION['usuario_id'].')">
                  <img src="./img/favorito.png"></img>
                </div>
                <div class="download" id="d4" onclick="downloadImage(4,\''.$_SESSION['usuario'].'\')">
                  <img src="./img/download.png"></img>
                </div>
              </div>
            </div>
          ';
          break;
        case 5:
          echo 
          '
            <div>
              <canvas id="myChartPolarArea"></canvas>
              <script type="text/javascript"> polarArea(dimensao_array, metrica_array, nome_dimensao);</script>
              <div class="legenda">
                <div class="favorito" onclick="ApagarFavorito('.$dado[4].','.$dado[5].', \''.$dado[1].'\', \''.$dado[2].'\', \''.$dado[3].'\', '.$_SESSION['usuario_id'].')">
                  <img src="./img/favorito.png"></img>
                </div>
                <div class="download" id="d5" onclick="downloadImage(5,\''.$_SESSION['usuario'].'\')">
                  <img src="./img/download.png"></img>
                </div>
              </div>
            </div>
          ';
          break;
        case 6:
          echo 
          '
            <div>
              <canvas id="myChartLine2"></canvas>
              <script type="text/javascript"> lineSimple(dimensao_array, metrica_array, nome_dimensao);</script>
              <div class="legenda">
                <div class="favorito" onclick="ApagarFavorito('.$dado[4].','.$dado[5].', \''.$dado[1].'\', \''.$dado[2].'\', \''.$dado[3].'\', '.$_SESSION['usuario_id'].')">
                  <img src="./img/favorito.png"></img>
                </div>
                <div class="download" id="d6" onclick="downloadImage(6,\''.$_SESSION['usuario'].'\')">
                  <img src="./img/download.png"></img>
                </div>
              </div>
            </div>
          ';
          break;
    }
  }
  echo '</section>';
?>
</body>
</html>