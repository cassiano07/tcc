<?php
include('./php/verificar_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Título da página</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- MENU -->
  	<script src="https://kit.fontawesome.com/a076d05399.js"></script>   <!-- MENU -->
  	<link rel="stylesheet" type="text/css" href="./css/menu.css"> <!-- MENU -->
  	<link rel="stylesheet" type="text/css" href="./css/style_historico.css">
  </head>
  <body>
	<!-- MENU -->

	<nav>
		<input type="checkbox" id="check">
		<label for="check" class="checkbtn">
			<i class="fas fa-bars"></i>
		</label>

		<label class="logo"><img src="./img/logo.png"  width="100" height="80"></label>

		<ul>
			<li><a href="./dashbord.php"><?php $usuario = explode("@",$_SESSION['usuario']); echo $usuario[0];?></a></li>
			<li><a href="./favoritos.php">FAVORITOS</a></li>
			<li><a class="active" href="./historico.php">HISTÓRICO</a></li>
			<li><a href="../index.html">ARQUIVO</a></li>
			<li><a href="./php/logout.php">LOGOUT</a></li>
		</ul>
	</nav>
	<!-- Conteudo-->

<?php

	$valores = [
		0 => array(
			'id' => '1',
			'evento' => 'salvo grafico',
			'grafico' => 'Linha',
			'dado' => 'nome do conteudo',
			'data' => '2020'
			),
		1 => array(
			'id' => '2',
			'evento' => 'baixo grafico',
			'grafico' => 'bolinha',
			'dado' => 'nome do conteudo',
			'data' => '2019'
			),
		2 => array(
			'id' => '3',
			'evento' => 'salvo grafico',
			'grafico' => 'pizza',
			'dado' => 'nome do conteudo',
			'data' => '2018'
			),
	];

?>

	<div id="corpo">
		<table class="comBordaSimples">
			<thead>
				<tr>
					<th colspan="5" scope="col">Histórico de Alterações</th>
				</tr>
				<tr>
				<th scope="col">Código</th>
				<th scope="col">Evento</th>
				<th scope="col">Gráfico</th>
				<th scope="col">Dado</th>
				<th scope="col">Data de Alteração</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count = 1;
				if(is_array($valores))
				{
					foreach ($valores as $valor)
					{
						
						echo "<tr>
							<th scope=\"row\">".$count."</th>
							<td>".$valor['evento']."</td>
							<td>".$valor['grafico']."</td>
							<td>".$valor['dado']."</td>
							<td>".$valor['data']."</td>
						</tr>";
						$count++;
					}
				}
				else
				{
					echo "<tr>
							<th scope=\"row\"> - </th>
							<td> - </td>
							<td> - </td>
							<td> - </td>
							<td> - </td>
						</tr>";
				}
				?>
			</tbody>
		</table>
	</div>

	</nav>
  </body>
</html>