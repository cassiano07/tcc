<?php

include('./dashboard.php');

session_start();

$anexo = $_FILES['anexo'];

header('Content-Type: text/html; charset=utf-8');

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
		$count_valores = 1;
		$linhas = [];

		foreach ($dados as $dado)
		{

			$linha = explode(',', $dado);

			$count_linhas = count($linha);

			for($i = 0; $i < $count_linhas; $i++)
			{
				if($linha[$i] == null)
				{
					$linha[$i] = 'NaN';
				}
			}

			if($count_linhas ==  $count_colunas)
			{
				array_push($linhas,$linha);
			}
			else
			{
				echo '<script> alert("linha '.$count_valores.' com erro, verifique se algum dado está com virgula a onde não deveria"); window.location.href ="../../index.html";</script>"';
				exit();
			}

			$count_valores++;
			
		}
		
		$conteudo = processamento($colunas, $linhas, $nome_arquivo);

		if($conteudo)
		{
			if(!isset($_SESSION['usuario']))
			{
				$_SESSION['usuario'] = 'anonimo';
				$_SESSION['conteudo'] = $conteudo['id'];
				$_SESSION['usuario_id'] = $conteudo['usuario_id'];
				header('Location: ../dashbord.php');
			}
			else
			{
				$_SESSION['conteudo'] = $conteudo['id'];
				header('Location: ../dashbord.php');	
			}	
		}
		else
		{
			header('Location: ../../index.html');
		}
	}
}
else
{
	echo "Arquivo não recebido";
}






