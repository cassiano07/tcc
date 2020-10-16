<?php
session_start();

include ('conexao.php');
$usuario = filter_input(INPUT_POST, 'usuario');
$senha = mysqli_real_escape_string($connect, $_POST['senha']);

$querry = "select usuario from usuario where usuario = '{$usuario}' and senha = '{$senha}'";

$result =mysqli_query($connect, $querry);
$rows = mysqli_num_rows($result);


if($rows == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: ../dashbord.html');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../login.html');
	exit();
}