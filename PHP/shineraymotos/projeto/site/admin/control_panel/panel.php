<?php
    require_once __DIR__ . '/../../includes/init.inc.php';
    
    $mySQL      = new DB;
    $CampoAtivo = '';
    
    require_once __DIR__ . '/../../includes/assets/_inc_header.php';
?>
        <div class="row-fluid">
            <div class="span4">
                <div class="titulo-div">
                    Controles administrativos
                </div>
                <div class="corpo-div">
                    <ul role="menu" style="float: left;">
                        <li role="presentation"><a class="item-menu" role="menuitem" tabindex="-1" href="admin/cadastros/produtos.php">Cadastros</a></li>
                        <li role="presentation"><a class="item-menu" role="menuitem" tabindex="-1" href="Ferramentas">Ferramentas</a></li>
                        <li role="presentation"><a class="item-menu" role="menuitem" tabindex="-1" href="Usuarios">Usu&aacute;rios</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>