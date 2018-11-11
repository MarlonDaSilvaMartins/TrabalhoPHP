<html>
    <head>
        <title>Pagina Inicial</title>
        <meta charset="UTF-8"/>
    </head>
</html>
<body>
    <?php
        session_start();
        include_once '../controller/seguranca.php';
        include_once '../model/conexao.class.php';

        $con = new Conexao();
        
        if($con->connect()){echo "Conectou! ";}
        else{echo "não conectou! ";}
        
        echo "Bem vindo ".$_SESSION['usuarioNome'];
    ?>
    <br/>
    <a href="formulario1.php">Registrar usuário</a>
    <br/>
    <a href="formulario2.php">Registrar aluno</a>
    <br/>
    
<!--responsavel-->    
    <table style="border: 1px blueviolet solid;">
        <thead>
            <tr><th colspan="4">Responsáveis</th></tr>
            <tr>
                <th>Nome</th>
                <th>telefone</th>
                <th>data de criação</th>   
            </tr>            
        </thead>
        <tbody>
            <?php
                $consulta =  mysql_query("select * from tb_usuario");
                while($campo = @mysql_fetch_array($consulta)){
                ?>
            <tr>
                <td><?php echo $campo['nome'];?>&nbsp</td>
                <td><?php echo $campo['telefone'];?>&nbsp</td>
                <td><?php echo $campo['data_criacao'];?>&nbsp</td>           
                
                <td><a href="formulario1.php?id=<?php echo $campo['id'];?>">Editar</a></td>
                <td><a href="../controller/excluirUsuario.php?id=<?php echo $campo['id'];?>">Excluir</a></td>
            </tr>
            <?php }//fecha while?>           
        </tbody>
    </table>
    
    
<!--alunos-->
    <table style="border: 1px blueviolet solid;">
        <thead>
            <tr><th colspan="4">Alunos</th></tr>
            <tr>
                <th>Nome</th>
                <th>Data nascimento</th>
                <th>Responsável</th>   
            </tr>            
        </thead>
        <tbody>
            <?php
                $consulta =  mysql_query("select * from tb_aluno");
                while($campo = @mysql_fetch_array($consulta)){
                ?>
            <tr>
                <td><?php echo $campo['nome'];?>&nbsp</td>
                <td><?php echo $campo['data_nasc'];?>&nbsp</td>
                <td><?php echo $campo['usuario_responsavel'];?>&nbsp</td>           
                
                <td><a href="formulario2.php?id=<?php echo $campo['id'];?>">Editar</a></td>
                <td><a href="../controller/excluirAluno.php?id=<?php echo $campo['id'];?>">Excluir</a></td>
            </tr>
            <?php }//fecha while?>
            <br/>
           
        </tbody>
    </table>
<a href="../controller/sair.php">Sair</a>
  </body>
</html>
<?php $con->disconnect()?>

