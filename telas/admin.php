<?php 
include ('./php/lista_usuarios.php');
include('./php/verificar_login.php');

$valores = usuarios();


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" href="./img/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="./javascript/users_admin.js"></script>
  </head>
  <body>
    <div class="group">
        <div id="painel">
            <div id="logo">
                <img src="./img/logo.png">
            </div>
            <ul>
                <li><a href="#"><span class="fa fa-users" aria-hidden="true"></span>Usuários</a></li>
                <li><a href="./admin_grafico.php"><span class="fa fa-pie-chart" aria-hidden="true"></span>Gráficos</a></li>
                <li><a href="./php/logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span>Sair</a></li>
            </ul>
        </div>

        <!-- Menu superior-->
        <div id="menu">
            <p>Lista de Usuários</p>
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

                        <label for="email">E-mail:</label>
                        <input type="text" name="email" placeholder="Novo E-mail">

                        <label for="senha">Senha:</label>
                        <input type="text" name="senha" placeholder="Novo senha">

                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" placeholder="Novo Telefone">

                        <label for="permissao">Permissão:</label>
                        <input type="text" name="permissao" placeholder="Novo Permissão">

                        <button>Enviar</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"><i onclick="criarUsuario()" class="fa fa-user-plus" aria-hidden="true"></i></th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Permissão</th>
                        <th scope="col">Criação</th>
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
							<td>".$valor[4]."</td>
							<td>".$valor[3]."</td>
							<td>".$valor[5]."</td>
							<td>".$valor[6]."</td>
							<td><i onclick=\"Usuario(".$valor[0].")\" id=\"controle\" class=\"fa fa-pencil\" aria-hidden=\"true\"></i> <i onclick=\"ApagarUsuario(".$valor[0].")\" class=\"fa fa-user-times\" aria-hidden=\"true\"></i></td>
						</tr>";
                }
                echo '</tbody>';
                ?>
            </table>
        </div>
    </div>
  </body>
</html>