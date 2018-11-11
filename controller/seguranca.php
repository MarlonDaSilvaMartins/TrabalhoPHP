<?php

ob_start();

if($_SESSION['usuarioId']==''||($_SESSION['usuarioNome']=='')||
  ($_SESSION['usuarioNivelAcesso']=='')||($_SESSION['usuarioLogin']=='')||
  ($_SESSION['usuarioSenha']=='')){
        unset($_SESSION['usuarioId'],$_SESSION['usuarioNome'],$_SESSION['usuarioNivelAcesso'],
                $_SESSION['usuarioLogin'],$_SESSION['usuarioSenha']);

$_SESSION['loginErro'] = "Área restrita para ususarios cadastrados";

header("Location: ../index.php");
}
?>
