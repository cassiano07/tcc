<?php

include('./dashboard.php');

$anexo = $_FILES['anexo'];



if(isset($anexo))
{
	$tipo_arquivo = explode('.', $anexo['name']);

	$nome_arquivo = $anexo['name'];

	if($tipo_arquivo[1] == 'csv' || $tipo_arquivo[1] == 'xls')
	{
		$dados = file($anexo['tmp_name']);
		$count_line = count($dados);
		$colunas = $dados[0]; // recebe colunas
		$colunas = explode(',', $colunas);
		$count_colunas = count($colunas);
		unset($dados[0]);  // Remove as colunas dos dados.
		$count_valores = 0;
		$linhas = [];

		foreach ($dados as $dado)
		{
			$linha = explode(',', $dado);
			$count_linhas = count($linha);

			if($count_linhas ==  $count_colunas)
			{
				echo 'linha '.$count_valores.' sem erro <br>';
				array_push($linhas,$linha);
			}
			else
			{
				echo 'linha '.$count_valores.' com erro, verifique se algum dado está com virgula a onde não deveria <br>';
				exit();
			}

			$count_valores++;
			
		}
		
		$dados_for_database = processamento($colunas, $linhas, $nome_arquivo);
		
		var_dump($dados_for_database);
	}
}
else
{
	echo "Arquivo não recebido";
}






