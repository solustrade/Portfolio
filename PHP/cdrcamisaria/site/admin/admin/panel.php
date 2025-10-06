<?php
    require_once __DIR__ . '/../../includes/connection/_inc_db_connect.php';
    require_once __DIR__ . '/../../includes/assets/_inc_header.php';
?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="well">
                        <div class="dropdown theme-dropdown clearfix">
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li class="active" role="presentation"><a role="menuitem" tabindex="-1" href="Categories">Cadastro de categorias</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="Products">Cadstro de produtos</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="ProductsPhotos">Cadstro de fotos dos produtos</a></li>
                                                                
                                <li role="presentation" class="divider"></li>
                                
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="CPanel_List_1">Listagem de categorias</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="CPanel_List_2">Listagem de produtos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="well">
                        <?php
                            $Action = $_GET['act10n'];
                            
                            if ($Action == 1) {
                                echo 'Valor do menu: ' . $Action;
                            }
                            if ($Action == 2) {
                                echo 'Valor do menu: ' . $Action;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>