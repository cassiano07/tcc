<?php
include ('conexao.php');

$conexao =  connect();

$grafico_id = ( isset($_GET['grafico_id']) ) ? $_GET['grafico_id'] : null;
$conteudo_id = ( isset($_GET['conteudo_id']) ) ? $_GET['conteudo_id'] : null;
$usuario_id = ( isset($_GET['usuario_id']) ) ? $_GET['usuario_id'] : null;
$dimensao = ( isset($_GET['dimensao']) ) ? $_GET['dimensao'] : null;
$metrica = ( isset($_GET['metrica']) ) ? $_GET['metrica'] : null;
$operacao = ( isset($_GET['operacao']) ) ? $_GET['operacao'] : null;


$query = "SELECT * FROM favorito  WHERE conteudo_id = ".$conteudo_id." AND grafico_id = ".$grafico_id." AND  usuario_id = ".$usuario_id." AND dimensao = '".$dimensao."' AND metrica = '".$metrica."' AND operacao = '".$operacao."'";
$execute = mysqli_query($conexao, $query);
$rows = mysqli_fetch_array($execute);

if(!$rows)
{
    $sql = "INSERT INTO favorito (conteudo_id, grafico_id, usuario_id, dimensao, metrica, operacao) VALUES (".$conteudo_id.", ".$grafico_id.", ".$usuario_id.", '".$dimensao."', '".$metrica."', '".$operacao."')";
    $result = mysqli_query($conexao, $sql);
}





