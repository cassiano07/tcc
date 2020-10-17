<?php
session_start();

include ('conexao.php');
$email = filter_input(INPUT_POST, 'usuario');
$senha = mysqli_real_escape_string($connect, $_POST['senha']);

$query = "select * from usuarios where email = '{$email}' and senha = '{$senha}'";

$result =mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);


if($rows == 1) {
	echo $_SESSION['usuario'] = $email;
	header('Location: ../dashbord.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../login.php');
	exit();
}