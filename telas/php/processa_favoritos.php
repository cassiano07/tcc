<?php

function conteudo($usuario_id)
{
    $conexao =  connect();
    $valores = [];
  
    $query = "SELECT ca.dados, f.dimensao, f.metrica, f.operacao, grafico_id, f.conteudo_id FROM  favorito f join conteudo_arquivo ca on ca.id  = f.conteudo_id where f.usuario_id = ".$usuario_id;
    $result = $conexao->query($query);
    $rows = $result->fetch_all();

    return $rows;
}