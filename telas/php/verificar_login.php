<?php

session_start();
if(!$_SESSION['usuario'])
{
	header('Location: /tcc/telas/login.php');
	exit();
}