<?php
include ('conexao.php');

$conexao =  connect();

$id = ( isset($_POST['codigo']) ) ? $_POST['codigo'] : null;
$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
$tipo = ( isset($_POST['tipo']) ) ? $_POST['tipo'] : null;
$query = null;
$dados_array = [];

if($id != 0)
{
    $query_inicial = "UPDATE grafico SET ";
    $query_fim = " WHERE id = ".$id;

    if($nome != null)
    {
        $nome = "nome = '".$nome."'";
        array_push($dados_array,$nome);
    }
    if($tipo != null)
    {
        $tipo = "tipo = '".$tipo."'";
        array_push($dados_array,$tipo);
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
        header('Location: ../admin_grafico.php');
		exit();
    }
    else
    {
        header('Location: ../admin_grafico.php');
		exit();
    }
}