<?php

/* $dimensao = ( isset($_POST['dimensao']) ) ? $_POST['dimensao'] : null;
$metrica = ( isset($_POST['metrica']) ) ? $_POST['metrica'] : null;
$operacao = ( isset($_POST['operacao']) ) ? $_POST['operacao'] : null;
$conteudo = ( isset($_POST['conteudo']) ) ? $_POST['conteudo'] : null;


if($dimensao != null || $metrica != null || $operacao != null || $conteudo != null)
{
	dados($conteudo, $dimensao, $metrica, $operacao);
} */


function dados($dados, $dimensao, $metrica, $operacao, $type)
{
	// aqui fazemos uma inserção na tabela de historico, caso seja um usuário cadastrado.
	$valores_coluna_dimensao = [];
	$valores_coluna_metrica = [];
	$chave_valores_duplicados = [];

	$dados_array = explode(',', $dados);

	// Separando todos os dados 
	$dados_metricas = $dados_array[0];
	unset($dados_array[0]);  // Remove as colunas dos dados.
	$dados_dimensao = $dados_array[1];
	unset($dados_array[1]);  // Remove as colunas dos dados.
	$dados_colunas = $dados_array[2];
	unset($dados_array[2]);  // Remove as colunas dos dados.
	$num_linhas = count($dados_array);
	$dados_linhas = $dados_array;

	$colunas =  explode('|', $dados_colunas);

	$chave_coluna_dimensao = array_search($dimensao, $colunas);
	$chave_coluna_metrica = array_search($metrica, $colunas);

	foreach($dados_linhas as $linha)
	{
		$valores_linha = explode('|', $linha);

		array_push($valores_coluna_dimensao,$valores_linha[$chave_coluna_dimensao]);
		array_push($valores_coluna_metrica,$valores_linha[$chave_coluna_metrica]);
	}

	$contagem_valores_dimensao = count($valores_coluna_dimensao);

	$contador_for = 0;

	$new_valores_dimensao = [];

	$new_valores_metrica = [];

	$resultado_metrica = 0;

	$contador_if = 0;


	//Para fazer a soma/multiplicação/divisão/contagem dos valores de um elemento que seja igual ao outro
	while ($valor_dimensao = current($valores_coluna_dimensao))
	{
		$key1 = key($valores_coluna_dimensao);
		foreach ($valores_coluna_dimensao as $key => $valor_dimensao2)
		{
			if(strtolower($valor_dimensao) == strtolower($valor_dimensao2))
			{
				switch($operacao)
				{
					case 'soma':
						if($contador_if == 0)
						{
							$resultado_metrica = floatval($valores_coluna_metrica[$key]);
						}
						else
						{
							$resultado_metrica = $resultado_metrica + floatval($valores_coluna_metrica[$key]);
							unset($valores_coluna_dimensao[$key]);
							unset($valores_coluna_metrica[$key]);
						}
						$contador_if++;

						break;

					case 'multiplicacao':
						if($contador_if == 0)
						{
							$resultado_metrica = floatval($valores_coluna_metrica[$key]);
						}
						else
						{
							$resultado_metrica = $resultado_metrica * floatval($valores_coluna_metrica[$key]);
							unset($valores_coluna_dimensao[$key]);
							unset($valores_coluna_metrica[$key]);
						}
						$contador_if++;

						break;

					case 'contagem':
						if($contador_if == 0)
						{
							$resultado_metrica = 1;

						}
						else
						{
							$resultado_metrica = $resultado_metrica + 1;
							unset($valores_coluna_dimensao[$key]);
							unset($valores_coluna_metrica[$key]);
						}
						$contador_if++;

						break;
				}
			}
		}

		$contador_if = 0;
		next($valores_coluna_dimensao);
		array_push($new_valores_dimensao, $valor_dimensao);
		array_push($new_valores_metrica, $resultado_metrica);
		unset($valores_coluna_dimensao[$key1]);
		unset($valores_coluna_metrica[$key1]);
		$contador_for++;
	}

	if($type == 'metrica')
	{
		return $new_valores_metrica;
	}
	else
	{
		return $new_valores_dimensao;
	}
}


function colunas($dados, $tipo)
{
	$dados_array = explode(',', $dados);

	// Separando todos os dados 
	$dados_metricas = $dados_array[0];
	$dados_dimensao = $dados_array[1];


	// transformando dados em array
	$dados_metricas  = str_replace('metrica_', '', $dados_metricas); // removendo string que coloquei para orientação
	$dados_dimensao  = str_replace('dimensao_', '', $dados_dimensao); // removendo string que coloquei para orientação

	$metricas =  explode('|', $dados_metricas);
	$dimensao =  explode('|', $dados_dimensao);

	if($tipo ==  'metrica')
	{
		return $metricas;
	}
	else
	{
		return $dimensao;
	}
}

