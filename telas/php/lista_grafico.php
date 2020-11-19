<?php

include ('conexao.php');

function graficos()
{
    $conexao =  connect();
  
    $query = "SELECT id,nome,tipo,DATE_FORMAT(data_criacao,'%d/%m/%Y') as data_criacao FROM  ea.grafico";
    $result = $conexao->query($query);
    $rows = $result->fetch_all();

    return $rows;
}