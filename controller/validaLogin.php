<meta charset="utf-8">
<?php
include_once '../model/conexao.class.php';
$con = new Conexao();
$con->connect();
session_start();

$login = $_POST['usuario'];
$senha = $_POST['senha'];

//include_once '../model/conexao.class.php';

$result = mysql_query( "select * from tb_usuario where login = '$login'".
                       " and senha = '$senha' LIMIT 1");

$resultado = mysql_fetch_assoc($result);
//echo "Usuário: " . $resultado['nome'];

if (empty($result)) {
    $_SESSION['loginErro'] = "Usuário ou senha inválida";
    header("Location: ../index.php");
} else {
    $_SESSION['usuarioId'] = $resultado['id'];
    $_SESSION['usuarioNome'] = $resultado['nome'];
    $_SESSION['usuarioNivelAcesso'] = $resultado['nivel_acesso_id'];
    $_SESSION['usuarioLogin'] = $resultado['login'];
    $_SESSION['usuarioSenha'] = $resultado['senha'];

    if ($_SESSION['usuarioNivelAcesso'] == 1) {
        header("Location: ../view/adm.php");
    } else {
        header("Location: ../view/usuario.php");
    }//else
    
    /*if ($_SESSION['usuarioNivelAcesso'] != 1) {
        header("Location: ../view/usuario.php");    
    } else {
        header("Location: ../view/adm.php");
    }//else
    */
}//else
?>