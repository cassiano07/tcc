<?php

function dados($dados)
{
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

	// transformando dados em array
	$dados_metricas  = str_replace('metrica_', '', $dados_metricas); // removendo string que coloquei para orientação
	$dados_dimensao  = str_replace('dimensao_', '', $dados_dimensao); // removendo string que coloquei para orientação

	$metricas =  explode('|', $dados_metricas);
	$dimensao =  explode('|', $dados_dimensao);
	$colunas =  explode('|', $dados_colunas);


	return $colunas;
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

