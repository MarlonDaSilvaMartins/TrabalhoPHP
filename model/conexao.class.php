<meta charset="utf-8">
<?php
class Conexao {
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'db_escola';
    private $conn = FALSE;
    
    function connect() {
        if (!$this->conn) {
            $myConn = @mysql_connect($this->db_host, $this->db_user, $this->db_pass);
            
            if($myConn){
                $seldb = mysql_select_db($this->db_name);
                if($seldb){
                    $this->conn = TRUE;
                    return TRUE;
                    }else{
                        return FALSE;
                        }//else
                }else{
                return FALSE;
                }//else
            }else{
                return TRUE;
        }//else
    }//function
        function disconnect() {
            if($this->conn){
                if(mysql_close()){
                    $this->conn = FALSE;
                    return TRUE;
                }else{
                    return FALSE;
                }//else
            }//if
        }//function   
    }//class