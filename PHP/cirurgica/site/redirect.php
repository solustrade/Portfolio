<?php
    $Usuario = $_POST['LoginUser'];
	$Senha   = $_POST['LoginPass'];
    
    require_once 'include/init.inc.php';
    
    if (($Usuario <> '') and ($Senha <> '')) {
        $mySQL = new DB;
        
		$query = $mySQL->executeQuery('SELECT login, AES_DECRYPT(senha, chave) as password FROM usuarios WHERE login = "' . $Usuario . '" and senha = aes_encrypt("' . $Senha . '", chave)');
        $retorno = mysqli_fetch_array($query, MYSQLI_ASSOC);
        
        if (($retorno['login'] == $Usuario) && ($retorno['password'] == $Senha)) {
            header("location:Acao");
        }
        else {
            echo '<p><h5>Desculpe ' . $retorno['nome'] .'! Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar esta parte do site!</p>';
            echo '<p><a href="Login" style="text-decoration: none;">Retornar...</a></p>';
        }
    }
    else {
        header("location:Login");
    }
?>