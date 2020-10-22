<?php

include ('conexao.php');

function processamento($colunas, $linhas, $nome_arquivo)
{
	$num_colunas = count($colunas);
	$num_linhas = count($linhas);
	$tipo = [];
	$linhas_dados = [];
	$dimensao = '';
	$metrica = '';
	$colunas_texto = [];
	$colunas_numerica = [];
	$dados = '';
	$count = 0;
	$count2 = 0;
	$dados_for_database = '';

	// Limpando dados das linhas
	foreach ($linhas as $linha)
	{
		for($i = 0; $i < $num_colunas; $i++)
		{
			$valor_linha = $linha[$i];

			$valor_linha = trim(str_replace('"', '', $valor_linha)); // removendo aspas duplas da string e espaços

			if(!preg_match('/[a-zA-Z]/', $valor_linha)>0) // verificar ser existe letras
			{
				$valor_linha = floatval($valor_linha);
			}

			if($i == 0)
			{
				$dados = $valor_linha;
			}
			else
			{
				$dados = $dados.'|'.$valor_linha;
			}

			array_push($tipo,gettype($valor_linha)); // fazendo um array com todos os tipos existente em todas as linhas
		}
			
		if($count == 0)
		{
			$dados_linhas = $dados;
		}
		else
		{
			$dados_linhas = $dados_linhas.','.$dados;
		}

		$count++;
			
	}

	//limpando os dados das colunas
	foreach ($colunas as $coluna)
	{

		$valor_coluna = $coluna;

		$valor_coluna = trim(str_replace('"', '', $valor_coluna)); // removendo aspas duplas da string e espaços
			
		if($count2 == 0)
		{
			$dados_colunas = $valor_coluna;
		}
		else
		{
			$dados_colunas = $dados_colunas.'|'.$valor_coluna;
		}

		$count2++;
			
	}

	for($f = 0; $f < $num_colunas; $f++)
	{
		$num_linha = $num_colunas;
		$num_dados2 =  ($num_linha * 2)-2;

		for($num_linha; $num_linha == $num_dados2; $num_linha++)
		{
			if($tipo[$f] == $tipo[$num_linha])
			{
				if($tipo[$f] == 'string')
				{
					array_push($colunas_texto,trim(str_replace('"', '', $colunas[$f])));
					
				}
				else
				{
					array_push($colunas_numerica,trim(str_replace('"', '', $colunas[$f])));
				}
			}
		}
	}

	$dimensao = 'dimensao_'.implode("|",array_unique($colunas_texto));
	$metrica = 'metrica_'.implode("|", array_unique($colunas_numerica));

	$dados_for_database = $metrica.','.$dimensao.','.$dados_colunas.','.$dados_linhas;

	$connect = connect();

	$sql = "INSERT INTO conteudo_arquivo (titulo, dados, user_id) VALUES ('{$nome_arquivo}','{$dados_for_database}', 1)";
	
	$result = mysqli_query($connect, $sql);

	if($result == true)
	{
		return 'sucesso';
	} 
	else
	{
		return 'erro na inserção';
	}

	
}