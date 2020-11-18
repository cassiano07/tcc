<?php
include ('conexao.php');


function hist($usuarioid)
{
	$connect = connect();
    $query = "select H.id,G.nome,CA.titulo,H.evento,H.data_criacao from historico H 
left join conteudo_arquivo CA on CA.id = H.conteudo_id
left join grafico G on H.grafico_id = G.id
where H.usuario_id = ".$usuarioid;
	$result = mysqli_query($connect, $query);
	$linhas = $result -> fetch_all();
	return $linhas;
}	
?>

