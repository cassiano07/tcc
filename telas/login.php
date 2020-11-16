<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel= "stylesheet" href="./css/menu.css">  <!-- MENU -->
    <link rel= "stylesheet" href="./css/login.css">  <!-- LOGIN -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- MENU -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- MENU -->

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
        <li><a href="../index.html">HOME</a></li>
        <li><a href="./sobre_nos.html">SOBRE NÓS</a></li>
        <li><a class="active" href="#">LOGIN</a></li>
      </ul>
    </nav>

    <!-- LOGIN -->
  <div class="wrapper">
      <div class="title-text">
        <div class="title login">Conta</div>
        <div class="title signup">Cadastro</div>
      </div>
    <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Conecte-se</label>
          <label for="signup" class="slide signup">Cadastre-se</label>
          <div class="slider-tab">
        </div>
      </div>

      <div class="form-inner"> 
        <form action="./php/login.php" method="post" class="login"> <!-- LOGIN form -->
          <div class="field">
            <input type="text" name="email" placeholder="Endereço de e-mail" required>
          </div>
          <div class="field">
            <input type="password" name="senha" placeholder="Senha" required>
          </div>

          <?php
            if(isset($_SESSION['nao_autenticado'])):
          ?>
          <p align="center" color="red">
            <font color="red">
            Senha ou Email incorreto!
            </font>
          </p>
          <?php
          endif;
          unset($_SESSION['nao_autenticado']);
          ?>

          <?php
            if(isset($_SESSION['usuario_existe'])):
          ?>
          <p align="center" color="red">
            <font color="red">
            E-mail já cadastrado.
            </font>
          </p>
          <?php
          endif;
          unset($_SESSION['usuario_existe']);
          ?>

          <?php
            if(isset($_SESSION['erro_cadastro'])):
          ?>
          <p align="center" color="red">
            <font color="red">
            Erro na hora de criar a conta.
            </font>
          </p>
          <?php
          endif;
          unset($_SESSION['erro_cadastro']);
          ?>

          <?php
            if(isset($_SESSION['usuario_criado'])):
          ?>
          <p align="center" color="red">
            <font color="green">
            Conta criada, faça login.
            </font>
          </p>
          <?php
          endif;
          unset($_SESSION['usuario_criado']);
          ?>
          
          <div class="pass-link">
            <a href="#">Esqueceu a senha?</a>
          </div>
          <div class="field btn">
            <div class="btn-layer">
            </div>
            <input type="submit" value="Acessar">
          </div>
          <div class="signup-link">Não é um membro? <a href="">Inscreva-se agora</a></div>
        </form>

        <form action="./php/cadastro.php" method="post" class="signup"> <!-- cadastro form-->
          <div class="field">
            <input type="text" name="nome" placeholder="Nome Completo" required>
          </div>
          <div class="field">
            <input type="text" name="telefone" placeholder="Número de telefone" required>
          </div>
          <div class="field">
            <input type="text" name="email" placeholder="Endereço de e-mail" required>
          </div>
          <div class="field">
            <input type="password" name="senha" placeholder="Senha" required>
          </div>
          <div class="field">
            <input type="password" name="senhaConfirma" placeholder="Confirme a Senha" required>
          </div>
          <div class="field btn">
              <div class="btn-layer">
              </div>
              <input type="submit" value="Criar">
          </div>
        </form>
      </div>
    </div>
  </div>
<script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>
  </body>
</html>