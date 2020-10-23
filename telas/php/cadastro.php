<?php
session_start();
include ('conexao.php');

$connect = connect();

$nomecompleto = mysqli_real_escape_string($connect, trim ($_POST['nome']));
$telefone = mysqli_real_escape_string($connect,trim ($_POST['telefone']));
$email = mysqli_real_escape_string($connect, trim ($_POST['email']));
$senha = mysqli_real_escape_string($connect, trim ($_POST['senha']));
$senhaconfirma = mysqli_real_escape_string($connect, trim ($_POST['senhaConfirma']));


$sql = "select count(*) as total from usuarios where email='{$email}'";
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_assoc($result);

if ($rows['total'] >= 1){
	$_SESSION ['usuario_existe'] = true;
	header('Location: ../login.php');
	exit();
}
else
{
	$sql = "INSERT INTO usuarios (nome_completo, telefone, email, senha, categoria_id) VALUES ('{$nomecompleto}','{$telefone}','{$email}','{$senha}', 2)";
	$result = mysqli_query($connect, $sql);


	if($result == true)
	{
		$_SESSION['usuario_criado'] = $email;
		header('Location: ../login.php');
		exit();
	} else
	{
		$_SESSION['erro_cadastro'] = true;  // Esse erro_cadastro é para eu fazer uma mensagem para informa que teve algum erro na hora de criar o usuário.
		header('Location: ../login.php');
		exit();
	}
	
}
if($_POST)
{
	if ($senha == "")
	{
	    echo  "senha não foi digitada!</span>";
		} else if ($senha == $senhaConfirma) {
	    echo "As senhas são iguais: ";
	} else
	{
	    echo  "As senhas não conferem!";
	}

}
