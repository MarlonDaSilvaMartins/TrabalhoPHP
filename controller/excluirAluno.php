<?php
    require_once '../model/conexao.class.php';
    require_once '../model/crud.class.php';
    $con = new Conexao();
    $con->connect();
    
    $crud = new Crud('tb_aluno');
    $id = $_GET['id'];
    $crud->excluirUsuario("id = $id");

    $con->disconnect();
?>    



