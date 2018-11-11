<?php
    class crud{
        private $sql_ins = "";
        private $sql_sel = "";     
        private $sql_upd = "";
        private $sql_del = "";
        private $tabela = "";
        
              
        
        function __construct($tabela) {
            $this->tabela = $tabela;
            return $this->tabela;
        }//function
       
        function inserirUsuario($campos, $valores){
            $this->sql_ins = "insert into ".$this->tabela.
                                " ($campos) values ($valores)";
            
            if(!@mysql_query($this->sql_ins)){
                die("Erro na inclusão.<br/>Linha: ".
                        __LINE__."<br/>".@mysql_error()."<br/>"
                        . "<a href='../view/adm.php'>Voltar ao index</a>");
            }else{
                print "<script>window.location = '../view/adm.php';</script>";
            }//else
        }//function inserirUsuario       
        
        function inserirAluno($campos, $valores){
            $this->sql_ins = "insert into ".$this->tabela.
                                " ($campos) values ($valores)";
            
            if(!@mysql_query($this->sql_ins)){
                die("Erro na inclusão.<br/>Linha: ".
                        __LINE__."<br/>".@mysql_error()."<br/>"
                        . "<a href='../view/adm.php'>Voltar ao index</a>");
            }else{
                print "<script>window.location = '../view/adm.php';</script>";
            }//else
        }//function inserirAluno
        
        function atualizarUsuario($camposValores, $where=NULL){
            if($where){
                $this->sql_upd = "update  ".$this->tabela." set $camposValores where $where";
            }else{
                $this->sql_upd = "update  ".$this->tabela." set $camposValores where $where";
            }
        
        
            if (!@mysql_query($this->sql_upd)) {
                die("Erro na atualização.<br/>Linha: ".
                        __LINE__."<br/>Erro: ".mysql_error()."<a href='../view/adm.php>Voltar ao index</a>");
            }else{
                print"Registro atualização com sucesso!<br/>"
                    ."<a href='../view/adm.php'>Voltar</a>";
            }//fecha else
        }//function
        
        function atualizarAluno($camposValores, $where=NULL){
            if($where){
                $this->sql_upd = "update  ".$this->tabela." set $camposValores where $where";
            }else{
                $this->sql_upd = "update  ".$this->tabela." set $camposValores where $where";
            }
        
        
            if(!@mysql_query($this->sql_upd)){
                die("Erro na atualização.<br/>Linha: ".
                        __LINE__."<br/>Erro: ".mysql_error()."<a href='../view/adm.php>Voltar ao index</a>");
            }else{
                 print"Registro atualização com sucesso!<br/>"
                    . "<a href='../view/adm.php'>Voltar</a>";
            }//fecha else
        }//function
        
        function excluirUsuario($where=NULL){
            if($where){
                 $this->sql_sel = "select * from ".$this->tabela." where $where";
                 $this->sql_del = "delete from ".$this->tabela." where $where";
            }else{
                 $this->sql_sel = "select * from ".$this->tabela;
                 $this->sql_del = "delete from ".$this->tabela;
            }//else
             
            $regs = mysql_num_fields(@mysql_query($this->sql_sel));
             
            if($regs > 0){
                if (!@mysql_query($this->sql_del)){
                    die("Erro na exclusão.<br/>Linha: ".__LINE__."<br/>."
                    .@mysql_error()."<a href='../view/adm.php>Voltar</a>");
            }else{
                print"Registro excluido com sucesso!<br/>"
            ."<a href='../view/adm.php';>Voltar</a>";
            }//else
            }else{
                print"Registro não encontrado!<br/>"
            ."<a href='../view/adm.php';>Voltar</a>";        
            }//else
        }//function
        
        function excluirAluno($where=NULL){
            if($where){
                 $this->sql_sel = "select * from ".$this->tabela." where $where";
                 $this->sql_del = "delete from ".$this->tabela." where $where";
            }else{
                 $this->sql_sel = "select * from ".$this->tabela;
                 $this->sql_del = "delete from ".$this->tabela;
            }//else
             
            $regs = mysql_num_fields(@mysql_query($this->sql_sel));
             
            if($regs > 0){
                if (!@mysql_query($this->sql_del)){
                    die("Erro na exclusão.<br/>Linha: ".__LINE__."<br/>."
                    .@mysql_error()."<a href='../view/adm.php>Voltar</a>");
            }else{
                print"Registro excluido com sucesso!<br/>"
            ."<a href='../view/adm.php';>Voltar</a>";
            }//else
            }else{
                print"Registro não encontrado!<br/>"
            ."<a href='../view/adm.php';>Voltar</a>";        
            }//else 
        }//function
    }//class
?>    