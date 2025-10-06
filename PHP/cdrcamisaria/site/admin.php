<?php
    $CampoAtivo = 'login';

    require_once __DIR__ . '/includes/connection/_inc_db_connect.php';
    require_once __DIR__ . '/includes/assets/_inc_header.php';
?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="well-blue">
                        <form class="form-horizontal" method="post" action="Restrito">
                            <input type="text" name="login" id="login" placeholder="nome do usu&aacute;rio..." style="width: 200px;" />
                            <input type="password" name="senha" id="senha" placeholder="senha do usu&aacute;rio..." style="width: 200px;" />
                            <button class="btn" type="submit">Entrar</button>
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
            
                            $query   = mysql_query('SELECT nome, AES_DECRYPT(senha, "bispo") as password, tipo FROM usuarios WHERE login = "' . $LoginDig . '"');
                            $retorno = mysql_fetch_array($query);
            
                            if ($SenhaDig != '') {
                                if ($retorno['password'] == $SenhaDig) {
                                    echo '<h4>BEM-VINDO(A) ' . $retorno['nome'] . '.</h4>';
                                    
                                    if ($retorno['tipo'] == 'A') {
                                        echo ' <h5>Voc&ecirc; &eacute; um(a) Administrador(a).</h5>';
                                        echo '<form action="CPanel">
                                                <button class="btn" type="submit">Continuar</button>
                                              </form>';
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