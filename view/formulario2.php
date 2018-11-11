<?php
    require_once '../model/Conexao.class.php';
    require_once '../model/Crud.class.php';
    
    $con = new Conexao();
    $con->connect();

    @$getId = $_GET['id'];
    if ($getId) 
    {
        $consulta = @mysql_query("select * from tb_aluno "
                    . "where id = " . $getId);

        $campo = @mysql_fetch_array($consulta);
    }
    
    if (isset($_POST ['Cadastrar'])) 
    {
        $nome = $_POST ['nome'];        
        $data_nasc = $_POST ['data_nasc'];
        $data_criacao = $_POST ['data_criacao'];
        $usuario_responsavel = $_POST ['usuario_responsavel'];
        $crud1 = new Crud('tb_aluno');
        $crud1->inserirAluno("nome, data_nasc, data_criacao, usuario_responsavel",
                       "'$nome', '$data_nasc', '$data_criacao', '$usuario_responsavel'");

    }

    if (isset($_POST['Editar'])) 
    {
        $nome = $_POST ['nome'];        
        $data_nasc = $_POST ['data_nasc'];
        $data_criacao = $_POST ['data_criacao'];
        $usuario_responsavel = $_POST ['usuario_responsavel'];
        $crud2 = new Crud('tb_aluno');
        $crud2->atualizarAluno("nome='$nome',data_nasc='$data_nasc',data_criacao='$data_criacao',usuario_responsavel='$usuario_responsavel'" , "id='$getId'");
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
            
            <label>Data de nascimento: </label><br/>
            <input type="date" name="data_nasc" value="<?php echo (@$campo['data_nasc']); ?>" required/><br/><br/>
            
            <label>Data de criação: </label><br/>
            <input type="date" name="data_criacao" value="<?php echo (@$campo['data_criacao']); ?>" required/><br/><br/>
            
            <label>Usuário responsável: </label><br/>
            <input type="number" name="usuario_responsavel" value="<?php echo (@$campo['usuario_responsavel']); ?>" required/>
            <br/><br/>
                       
            <?php if(!@$campo['id']) { ?>
                <input type="submit" name="Cadastrar" value="Cadastrar"/>
            <?php } else { ?>
                <input type="submit" name="Editar" value="Editar"/>
            <?php } ?>

        </form>
    </body>
</html>
