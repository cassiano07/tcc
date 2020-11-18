<?php
include ('conexao.php');

$conexao =  connect();

$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$permissao = ( isset($_POST['permissao']) ) ? $_POST['permissao'] : null;

$query = "INSERT INTO usuarios (nome_completo, email, telefone, senha, categoria_id) VALUES ('".$nome."','".$email."', '".$telefone."', '".$senha."', ".$permissao.")";

if($query != null)
{
    $execute = mysqli_query($conexao, $query);
    header('Location: ../admin.php');
    exit();
}
else
{
    header('Location: ../admin.php');
    exit();
}