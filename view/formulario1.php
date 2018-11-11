<?php
    require_once '../model/Conexao.class.php';
    require_once '../model/Crud.class.php';
    
    $con = new Conexao();
    $con->connect();

    @$getId = $_GET['id'];
    if ($getId) 
    {
        $consulta = @mysql_query("select * from tb_usuario "
                    . "where id = " . $getId);

        $campo = @mysql_fetch_array($consulta);
    }
    
    if (isset($_POST ['Cadastrar'])) 
    {
        $nome = $_POST ['nome'];
        $email = $_POST ['email'];
        $telefone = $_POST ['telefone'];
        $login = $_POST ['login'];
        $senha = $_POST ['senha'];
        $nivel_acesso_id = $_POST ['nivel_acesso_id'];
        $data_criacao = $_POST ['data_criacao'];
        $crud = new Crud('tb_usuario');
        $crud->inserirUsuario("nome, email, telefone, login, senha, nivel_acesso_id, data_criacao",
                       "'$nome', '$email','$telefone','$login','$senha', '$nivel_acesso_id', '$data_criacao'");

    }

    if (isset($_POST['Editar'])) 
    {
        $nome = $_POST ['nome'];
        $email = $_POST ['email'];
        $telefone = $_POST ['telefone'];
        $login = $_POST ['login'];
        $senha = $_POST ['senha'];
        $nivel_acesso_id = $_POST ['nivel_acesso_id'];
        $data_criacao = $_POST ['data_criacao'];
        $crud = new Crud('tb_usuario');
        $crud->atualizarUsuario("nome='$nome',email='$email',telefone='$telefone',login='$login',senha='$senha',nivel_acesso_id='$nivel_acesso_id',data_criacao='$data_criacao'" , "id='$getId'");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Formuário de Cadastro de Contatos </title>
        <meta charset="utf-8">
    </head>

    <body>      
        <form action="" method="post">
            <label> Nome: </label><br/>
            <input type="text" name="nome" value="<?php echo @$campo['nome']; ?>" required/><br/><br/>
            
            <label>Email: </label><br/>
            <input type="text" name="email" value="<?php echo @$campo['email']; ?>" required/><br/><br/>
            
            <label>Telefone: </label><br/>
            <input type="number" name="telefone" value="<?php echo @$campo['telefone']; ?>" required/><br/><br/>
            
            <label>Login: </label><br/>
            <input type="text" name="login" value="<?php echo @$campo['login']; ?>" required/><br/><br/>
            
            <label>Senha: </label><br/>
            <input type="password" name="senha" value="<?php echo (@$campo['senha']); ?>" required/><br/><br/>
            
            <label>Nivel de acesso: </label><br/>
            <input type="number" name="nivel_acesso_id" value="<?php echo (@$campo['nivel_acesso_id']); ?>" required/><br/><br/>
            
            <label>Data de criação: </label><br/>
            <input type="date" name="data_criacao" value="<?php echo (@$campo['data_criacao']); ?>" required/><br/><br/>
                       
            <?php if(!@$campo['id']) { ?>
                <input type="submit" name="Cadastrar" value="Cadastrar"/>
            <?php } else { ?>
                <input type="submit" name="Editar" value="Editar"/>
            <?php } ?>

        </form>
    </body>
</html>
