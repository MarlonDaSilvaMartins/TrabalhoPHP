<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.ico">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sigin.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <?php
        unset($_SESSION['Id'],
              $_SESSION['Nome'],
              $_SESSION['NivelAcesso'],
              $_SESSION['Login'],
              $_SESSION['Senha']);
        ?>
        <form class="form-signin" action="controller/validaLogin.php" method="post">
            <h2 class="form-signin-heading text-center">Entrar</h2>
            <label for="inputEmail" class="sr-only">Usuário</label>
            <input type="text" class="form-control" name="usuario" placeholder="Informe usuário" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha" required><br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
        </form>
            <p class="text-center text-danger">
                <?php
                if (isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
                }
                ?>
            </p>
    </div> 
  </body>
</html>