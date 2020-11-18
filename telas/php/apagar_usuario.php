<?php
include ('conexao.php');

$conexao =  connect();

$usuario_id = ( isset($_GET['usuario_id']) ) ? $_GET['usuario_id'] : null;

$query = "DELETE FROM usuarios WHERE id = ".$usuario_id;

$execute = mysqli_query($conexao, $query);