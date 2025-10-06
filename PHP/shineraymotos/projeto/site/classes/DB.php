<?php
    class DB {
        var $host     = "localhost";
        var $user;
        var $password;
        var $database = "shineray_base";
        
        var $query;
        var $link;
        var $result;
        
        function DB() {
            //Apenas instancia o Objeto
        }
        
        function local_DB($login, $senha) {
            $this->user     = $login;
            $this->password = $senha;
        }
        
        //Esta função faz a conexão com o Banco de Dados
        function connect() {
            if (file_exists('../../classes/local.txt')) {
                $this->local_DB('root', '');
            }
            elseif (file_exists('../../classes/web.txt')) {
                $this->local_DB('shineray_admin', 'admin@2015');
            }
            
            $this->link=mysqli_connect($this->host,$this->user,$this->password);
            
            if(!$this->link) {
                echo "Falha na conexao com o Banco de Dados!<br />";
                echo "Erro: " . mysql_error();
                die();
            }
            elseif(!mysqli_select_db($this->link, $this->database)) {
                echo "O Banco de Dados solicitado não pode ser aberto!<br />";
                echo "Erro: " . mysql_error();
                die();
            }
        }
        
        //Esta função executa uma Query
        function executeQuery($query) {
            $this->connect();
            $this->query=$query;
            
            if($this->result=mysqli_query($this->link, $this->query)) {
                $this->disconnect(); 
                return $this->result;
            }
            else {
                echo "Ocorreu um erro na execução da SQL";
                echo "Erro :" . mysql_error();
                echo "SQL: " . $query;
                die();
                disconnect();
            }
        }
        
        //Esta função desconecta do Banco
        function disconnect(){
            return mysqli_close($this->link);
        }
    }
?>