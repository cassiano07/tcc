<?php
include ('conexao.php');
session_start();

$connect = connect();

if(isset($_SESSION['conteudo']) AND $_SESSION['usuario'] == 'anonimo')
{
    $conteudo_id = $_SESSION['conteudo'];
    $sql2 = "DELETE FROM conteudo_arquivo WHERE id = '{$conteudo_id}'";
    mysqli_query($connect, $sql2);
}
session_destroy();
header('Location: /tcc/index.html');
exit();