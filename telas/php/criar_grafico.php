<?php
include ('conexao.php');

$conexao =  connect();

$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
$tipo = ( isset($_POST['tipo']) ) ? $_POST['tipo'] : null;

$query = "INSERT INTO grafico (nome, tipo) VALUES ('".$nome."','".$tipo."')";

if($query != null)
{
    $execute = mysqli_query($conexao, $query);
    header('Location: ../admin_grafico.php');
    exit();
}
else
{
    header('Location: ../admin_grafico.php');
    exit();
}