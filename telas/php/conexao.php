﻿<?php
function connect()
{
	define ('HOST', '127.0.0.1');
	define ('USUARIO','root');
	define ('SENHA','');
	define ('BANCO','ea');

	$connect = mysqli_connect (HOST, USUARIO, SENHA, BANCO) or die ('Não houve conexão');

	return $connect;
}
