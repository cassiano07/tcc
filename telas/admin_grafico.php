<?php 
include ('./php/lista_grafico.php');
include('./php/verificar_login.php');

$valores = graficos();


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/admin_grafico.css">
    <link rel="stylesheet" href="./img/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="./javascript/graficos_admin.js"></script>
  </head>
  <body>
    <div class="group">
        <div id="painel">
            <div id="logo">
                <img src="./img/logo.png">
            </div>
            <ul>
                <li><a href="./admin.php"><span class="fa fa-users" aria-hidden="true"></span>Usuários</a></li>
                <li><a href="#"><span class="fa fa-pie-chart" aria-hidden="true"></span>Gráficos</a></li>
                <li><a href="./php/logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span>Sair</a></li>
            </ul>
        </div>

        <!-- Menu superior-->
        <div id="menu">
            <p>Lista de Gráficos</p>
        </div>
        <!-- Abaixo está a aba de usuário -->
        <div id="corpo">
            <div id="detalhe">
                <div id="detalhes">
                    <form  id="formulario" method="post">
                        <legend><i  onclick="fechar()" class="fa fa-times" aria-hidden="true"></i></legend>

                        <label id="codigo1" for="codigo">Codigo:</label>
                        <input type="text" id="codigo" name="codigo" placeholder="Codigo" required="required" readOnly>

                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" placeholder="Novo Nome">

                        <label for="tipo">Tipo:</label>
                        <input type="text" name="tipo" placeholder="Novo Tipo">

                        <button>Enviar</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"><i onclick="criarGrafico()" class="fa fa-plus" aria-hidden="true"></i></th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nome do Gráfico</th>
                        <th scope="col">Tipo de Gráfico</th>
                        <th scope="col">Data de Cadastro</th>
                        <th scope="col">Controles</th>
                    </tr>
                </thead>
                
                <?php 
                echo '<tbody>';
                foreach($valores as $valor)
                {
                    echo "<tr>
							<th scope=\"row\"></th>
							<th scope=\"row\">".$valor[0]."</th>
							<td>".$valor[1]."</td>
							<td>".$valor[2]."</td>
							<td>".$valor[3]."</td>
							<td><i onclick=\"grafico(".$valor[0].")\" id=\"controle\" class=\"fa fa-pencil\" aria-hidden=\"true\"></i> <i onclick=\"ApagarGrafico(".$valor[0].")\" class=\"fa fa-trash\" aria-hidden=\"true\"></i></td>
						</tr>";
                }
                echo '</tbody>';
                ?>
            </table>
        </div>
    </div>
  </body>
</html>