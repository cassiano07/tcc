<?php 

include('./php/verificar_login.php');
include('./php/dashboard.php');
include('./php/dados.php');

  $anonimo = '';
  $titulo = ['nome do arquivo'];

if(isset($_SESSION['usuario']) AND isset($_SESSION['conteudo']))
{
  $anonimo = $_SESSION['usuario'];
  $conteudo_id = $_SESSION['conteudo'];

  $conexao =  connect();
  
  $query = "select titulo, dados from conteudo_arquivo  where id = ".$conteudo_id;
  $result = mysqli_query($conexao, $query);
  $rows = mysqli_fetch_array($result);

  $metricas = colunas($rows['dados'], 'metrica');
  $dimensoes = colunas($rows['dados'], 'dimensao');
  $titulo = explode('.',$rows['titulo']);

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

    $dimensao_values  = str_replace("\t", ' ', $dimensao_values);
    $dimensao_values  = str_replace("'", '',$dimensao_values);

    if($conteudo_id == null)
    {
      $conteudo_id = 0;
    }

    $create_variable = "<script> 
    var dimensao = '".json_encode($dimensao_values)."';
    var metrica = '".json_encode($metrica_values)."';
    var nome_metrica = '".$metrica."';
    var nome_dimensao = '".$dimensao."';
    var dimensao_json =JSON.parse(dimensao);
    var metrica_json =JSON.parse(metrica);
    var dimensao_array = Array.from(dimensao_json);
    var metrica_array = Array.from(metrica_json);
    </script>";

    echo $create_variable;
  }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Dashbord</title>
  <meta charset="utf-8">
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
      <?php  echo $anonimo == 'anonimo' ? '': '<li><a href="./favoritos.php">FAVORITOS</a></li>'?>
      <?php  echo $anonimo == 'anonimo' ? '': '<li><a href="./historico.php">HISTÓRICO</a></li>'?>
      <li><a href="../index.html">ARQUIVO</a></li>
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
          <label class="space"><?php  echo $titulo[0]; ?></label> <!-- aqui será adicionado via php o nome do arquivo-->
            <select class="space"  name="dimensao"><!-- aqui será adicionado via php o nome das colunas que são texto-->
              <?php
              if(isset($dimensoes))
              {
                foreach ($dimensoes as $dimensao_list)
                {
                  echo '<option value="'.$dimensao_list.'">'.$dimensao_list.'</option>';
                }
              }
              ?>
            </select>
            <select class="space" name="metrica"><!-- aqui será adicionado via php o nome das colunas que são números-->
              <?php
              if(isset($metricas))
              {
                foreach ($metricas as $metrica_list)
                {
                  echo '<option value="'.$metrica_list.'">'.$metrica_list.'</option>';
                }
              }
              ?>
            </select>
            <select class="space" name="operacao"><!-- aqui será adicionado via php o nome das colunas que são números-->
               <option value="soma"> Soma </option>
               <option value="multiplicacao"> Multiplicação </option>
               <option value="contagem"> Contagem </option>
               <option value="nenhum"> Nenhum </option>
            </select>
            <input type="hidden" name="conteudo" <?php echo isset($rows['dados']) ? 'value="'.$rows['dados'].'"': '';?> >
          <input type="submit" name="gerar" value="Gerar" class="space">
        </form>
      </div>
    </div>

    
      <!-- BODY - GRAFICOS -->            
    <section class="flex">
      <div class="color">
        <canvas id="myChartLine"></canvas>
        <?php echo isset($operacao)? '<script type="text/javascript">line(dimensao_array, metrica_array, nome_dimensao);</script>' : ''?>
        <div class="legenda">
          <div class="favorito" id="1" <?php echo isset($operacao)? 'onclick="SalvarFavorito( 1,'.$conteudo_id.', \''.$dimensao.'\', \''.$metrica.'\', \''.$operacao.'\', \''.$_SESSION['usuario'].'\', '.$_SESSION['usuario_id'].','.'1'.')"':'';?>>
            <img src="./img/favorito.png"></img>
          </div>
          <div class="download" id="d1" <?php echo isset($operacao)? 'onclick="downloadImage(1,\''.$_SESSION['usuario'].'\')"': ''?>>
            <img src="./img/download.png"></img>
          </div>
        </div>
      </div>
      <div>
        <canvas id="myChartBarra"></canvas>
        <?php echo isset($operacao)? '<script type="text/javascript"> bar(dimensao_array, metrica_array, nome_dimensao);</script>' : ''?>
        <div class="legenda">
            <div class="favorito" id="2" <?php echo isset($operacao)? 'onclick="SalvarFavorito( 2,'.$conteudo_id.', \''.$dimensao.'\', \''.$metrica.'\', \''.$operacao.'\', \''.$_SESSION['usuario'].'\', '.$_SESSION['usuario_id'].','.'2'.')"':'';?>>
              <img src="./img/favorito.png"></img>
            </div>
            <div class="download"  id="d2" <?php echo isset($operacao)? 'onclick="downloadImage(2,\''.$_SESSION['usuario'].'\')"': ''?>>
              <img src="./img/download.png"></img>
            </div>
        </div>
      </div>
      <div>
        <canvas id="myChartRadar"></canvas>
        <?php echo isset($operacao)? '<script type="text/javascript"> radar(dimensao_array, metrica_array, nome_dimensao);</script>' : ''?>
        <div class="legenda">
            <div class="favorito" id="3" <?php echo isset($operacao)? 'onclick="SalvarFavorito( 3,'.$conteudo_id.', \''.$dimensao.'\', \''.$metrica.'\', \''.$operacao.'\', \''.$_SESSION['usuario'].'\', '.$_SESSION['usuario_id'].','.'3'.')"':'';?>>
              <img src="./img/favorito.png"></img>
            </div>
            <div class="download" id="d3" <?php echo isset($operacao)? 'onclick="downloadImage(3,\''.$_SESSION['usuario'].'\')"': ''?>>
              <img src="./img/download.png"></img>
            </div>
        </div>
      </div>
      <div>
        <canvas id="myChartPie"></canvas>
        <?php echo isset($operacao)? '<script type="text/javascript"> pie(dimensao_array, metrica_array, nome_dimensao);</script>' : ''?>
        <div class="legenda">
            <div class="favorito" id="4" <?php echo isset($operacao)? 'onclick="SalvarFavorito( 4,'.$conteudo_id.', \''.$dimensao.'\', \''.$metrica.'\', \''.$operacao.'\', \''.$_SESSION['usuario'].'\', '.$_SESSION['usuario_id'].','.'4'.')"':'';?>>
              <img src="./img/favorito.png"></img>
            </div>
            <div class="download" id="d4" <?php echo isset($operacao)? 'onclick="downloadImage(4,\''.$_SESSION['usuario'].'\')"': ''?>>
              <img src="./img/download.png"></img>
            </div>
        </div>
      </div>
      <div>
        <canvas id="myChartPolarArea"></canvas>
        <?php echo isset($operacao)? '<script type="text/javascript"> polarArea(dimensao_array, metrica_array, nome_dimensao);</script>' : ''?>
        <div class="legenda">
            <div class="favorito" id="5" <?php echo isset($operacao)? 'onclick="SalvarFavorito( 5,'.$conteudo_id.', \''.$dimensao.'\', \''.$metrica.'\', \''.$operacao.'\', \''.$_SESSION['usuario'].'\', '.$_SESSION['usuario_id'].','.'5'.')"':'';?>>
              <img src="./img/favorito.png"></img>
            </div>
            <div class="download" id="d5" <?php echo isset($operacao)? 'onclick="downloadImage(5,\''.$_SESSION['usuario'].'\')"': ''?>>
              <img src="./img/download.png"></img>
            </div>
        </div>
      </div>
      <div>
        <canvas id="myChartLine2"></canvas>
        <?php echo isset($operacao)? '<script type="text/javascript"> lineSimple(dimensao_array, metrica_array, nome_dimensao);</script>' : ''?>
        <div class="legenda">
            <div class="favorito" id="6" <?php echo isset($operacao)? 'onclick="SalvarFavorito( 6,'.$conteudo_id.', \''.$dimensao.'\', \''.$metrica.'\', \''.$operacao.'\', \''.$_SESSION['usuario'].'\', '.$_SESSION['usuario_id'].','.'6'.')"':'';?>>
              <img src="./img/favorito.png"></img>
            </div>
            <div class="download" id="d6" <?php echo isset($operacao)? 'onclick="downloadImage(6,\''.$_SESSION['usuario'].'\')"': ''?>>
              <img src="./img/download.png"></img>
            </div>
        </div>
      </div>
    </section>

</body>
</html>