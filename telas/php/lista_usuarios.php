<?php

include ('conexao.php');

function usuarios()
{
    $conexao =  connect();
  
    $query = "SELECT * FROM  usuarios";
    $result = $conexao->query($query);
    $rows = $result->fetch_all();

    return $rows;
}