<?php
include ('conexao.php');
session_start();

$conexao =  connect();

$grafico_id = ( isset($_GET['grafico_id']) ) ? $_GET['grafico_id'] : null;
$usuario = ( isset($_GET['usuario']) ) ? $_GET['usuario'] : null;
$usuario_id = $_SESSION['usuario_id'];


$sql3 = "INSERT INTO  historico (grafico_id, conteudo_id,evento, usuario_id, favorito_id) VALUES ($grafico_id, 0, 'Baixou uma imagem do gráfico', ".$usuario_id.",0)";
mysqli_query($conexao, $sql3);
