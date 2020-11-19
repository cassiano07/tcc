<?php

include ('conexao.php');

function usuarios()
{
    $conexao =  connect();
  
    $query = "SELECT id, nome_completo, email, telefone, senha, categoria_id,DATE_FORMAT(data_criacao,'%d/%m/%Y') as data_criacao FROM  ea.usuarios";
    $result = $conexao->query($query);
    $rows = $result->fetch_all();

    return $rows;
}