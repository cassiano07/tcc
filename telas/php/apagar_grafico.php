<?php
include ('conexao.php');

$conexao =  connect();

$grafico_id = ( isset($_GET['grafico_id']) ) ? $_GET['grafico_id'] : null;

$query = "DELETE FROM grafico WHERE id = ".$grafico_id;

$execute = mysqli_query($conexao, $query);