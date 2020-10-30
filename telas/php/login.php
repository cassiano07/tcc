<?php
session_start();

include ('conexao.php');

$connect = connect();

$email = filter_input(INPUT_POST, 'email');
$senha = mysqli_real_escape_string($connect, $_POST['senha']);

$query = "select * from usuarios where email = '{$email}' and senha ='{$senha}'";

$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);
$rows2 = mysqli_fetch_array($result);


if($rows == 1) {
	$_SESSION['usuario'] = $email;
	$_SESSION['usuario_id'] = $rows2['id'];
	header('Location: ../dashbord.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../login.php');
	exit();
}