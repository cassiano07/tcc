<?php
include ('conexao.php');

$conexao =  connect();

$id = ( isset($_POST['codigo']) ) ? $_POST['codigo'] : null;
$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$permissao = ( isset($_POST['permissao']) ) ? $_POST['permissao'] : null;
$query = null;
$dados_array = [];

if($id != 0)
{
    $query_inicial = "UPDATE usuarios SET ";
    $query_fim = " WHERE id = ".$id;

    if($nome != null)
    {
        $nome = "nome_completo = '".$nome."'";
        array_push($dados_array,$nome);
    }
    if($email != null)
    {
        $email = "email = '".$email."'";
        array_push($dados_array,$email);
    }
    if($senha != null)
    {
        $senha = "senha = '".$senha."'";
        array_push($dados_array,$senha);
    }
    if($telefone != null)
    {
        $telefone = "telefone = '".$telefone."'";
        array_push($dados_array,$telefone);
    }
    if($permissao!= null)
    {
        $permissao = "categoria_id = '".$permissao."'";
        array_push($dados_array,$permissao);
    }

    $count_data = count($dados_array);

    if($count_data > 0)
    {
        for($i = 0; $i < $count_data; $i++)
        {
            if($i == 0)
            {
                $query = $query_inicial.$dados_array[$i];
            }
            else
            {
                $query = $query.', '.$dados_array[$i];
            }
        }
        $query = $query.$query_fim;
    }

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
}