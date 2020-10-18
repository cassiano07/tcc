<?php

$valores = [
	0 => array(
		'id' => '1',
		'evento' => 'salvo grafico',
		'grafico' => 'Linha',
		'Dado' => 'nome do conteudo',
		'data' => '2020'
		),
	1 => array(
		'id' => '2',
		'evento' => 'baixo grafico',
		'grafico' => 'bolinha',
		'Dado' => 'nome do conteudo',
		'data' => '2020'
		),
	2 => array(
		'id' => '3',
		'evento' => 'salvo grafico',
		'grafico' => 'pizza',
		'Dado' => 'nome do conteudo',
		'data' => '2020'
		)
];



foreach ($valores as $alter)
{
	echo $alter['id'];
}

?>