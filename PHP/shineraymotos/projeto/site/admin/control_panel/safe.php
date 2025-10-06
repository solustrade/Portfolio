<?php
    require_once __DIR__ . '/../../includes/init.inc.php';
    
    $mySQL      = new DB;
    $CampoAtivo = 'login';
    
    require_once __DIR__ . '/../../includes/assets/_inc_header.php';
?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="well-blue">
                        <form class="form-horizontal" method="post" action="Restrito">
                            <input type="text" name="login" id="login" placeholder="nome do usu&aacute;rio..." style="width: 200px;" />
                            <input type="password" name="senha" id="senha" placeholder="senha do usu&aacute;rio..." style="width: 200px;" />
                            <button class="botao" type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="well">
                        <?php
                            $LoginDig = $_REQUEST['login'];
                            $SenhaDig = $_REQUEST['senha'];
            
                            $query   = $mySQL->executeQuery('SELECT nome, cpf, AES_DECRYPT(senha, chave) as password, tipo FROM usuarios WHERE login = "' . $LoginDig . '" and senha = aes_encrypt("' . $SenhaDig . '", chave)');
                            $retorno = mysqli_fetch_array($query);
                            
                            if ($SenhaDig != '') {
                                if ($retorno['password'] == $SenhaDig) {
                                    echo '<h4>BEM-VINDO(A) ' . $retorno['nome'] . '.</h4>';
                                    
                                    if (($retorno['tipo'] == 'A') || ($retorno['tipo'] == 'M')) {
                                        echo '<h5>Confirma entrar em sua &aacute;rea restrita?</h5>';
                                        echo '<form method="post" action="CPanel">
                                                <input type="hidden" id="DocumentId" name="DocumentId" value="' . $retorno['cpf'] . '" />
                                                <button class="btn" type="submit">Continuar</button>
                                              </form>';
                                    }
                                    else {
                                        echo '<h5>Desculpe ' . $retorno['nome'] .'! Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar esta parte do site!';
                                    }
                                }
                                else {
                                    echo '<h5>DADOS INCORRETOS</h5>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>