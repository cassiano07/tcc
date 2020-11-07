<?php
include ('conexao.php');

$conexao =  connect();

$grafico_id = ( isset($_GET['grafico_id']) ) ? $_GET['grafico_id'] : null;
$conteudo_id = ( isset($_GET['conteudo_id']) ) ? $_GET['conteudo_id'] : null;
$usuario_id = ( isset($_GET['usuario_id']) ) ? $_GET['usuario_id'] : null;

$query = "SELECT * FROM favorito  WHERE conteudo_id = ".$conteudo_id." AND grafico_id = ".$grafico_id." AND  usuario_id = ".$usuario_id."";
$execute = mysqli_query($conexao, $query);
$rows = mysqli_fetch_array($execute);

if(!$rows)
{
    $sql = 'INSERT INTO favorito (conteudo_id, grafico_id, usuario_id) VALUES ('.$conteudo_id.', '.$grafico_id.', '.$usuario_id.');';
    $result = mysqli_query($conexao, $sql);
}





