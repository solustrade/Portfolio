<?php
    require_once __DIR__ . '/includes/connection/_inc_db_connect.php';
    require_once __DIR__ . '/includes/init.inc.php';
    require_once __DIR__ . '/includes/assets/_inc_header.php';
    
    $Categoria = $_REQUEST['V4lC4t'];
    
    if ($Categoria == '') {
        $Categoria = 1;
    }
?>
    <div class="container-fluid">
        <div class="row-fluid">
                <!-- Corpo
                ================================================== -->
                <div class="span12">
                    <div class="well-clear">
                        <!-- Destaque
                        ================================================== -->
                        <!--<div class="row-fluid">
                            <div class="span12">
                                <div class="well-clear" style="padding: 2px;">
                                    <div class="header-banner"></div>
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="row-fluid">
                            <!-- Menu categorias
                            ================================================== -->
                            
                            <div class="span2">
                                <div class="well-clear" style="padding: 2px;">
                                    <div class="dropdown theme-dropdown clearfix">
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                            <div class="categoriasTitulo">
                                                <div>Categorias</div>
                                            </div>
                                            <?php
                                                $query = mysql_query("SELECT id, conteudo, valor FROM categorias order by posicao");
                                                
                                                while($categoria = mysql_fetch_array($query)) {
                                            ?>
                                            
                                            <li role="presentation">
                                                <!--<a role="menuitem" tabindex="-1" href="<?php //echo 'http://' . $_SERVER["HTTP_HOST"] . '/index.php?V4lC4t=' . $categoria['valor'] ?>"><?php //echo htmlentities($categoria['conteudo'], ENT_NOQUOTES, 'ISO-8859-1') ?></a>-->
                                                <a role="menuitem" tabindex="-1" href="Loja?V4lC4t=<?php echo $categoria['valor'] ?>"><?php echo htmlentities($categoria['conteudo'], ENT_NOQUOTES, 'ISO-8859-1') ?></a>
                                            </li>
                                            
                                            <?php
                                                }
                                            ?>
                                            
                                            <!--<li role="presentation" class="divider"></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Vitrine
                            ================================================== -->
                            <div class="span10">
                                <div class="well align-center">
                                    <div class="showcase">
                                        <h1 class="color-green">VITRINE</h1>
                                        <?php
                                            $query = mysql_query("SELECT id, descricao, valor, imagem, categoria FROM produtos where categoria='$Categoria' order by descricao");
                                            
                                            $breakAfter = 6;
                                            $i = 0;
                                      
                                            while($Produto = mysql_fetch_array($query)) {
                                                $i++;
                                                
                                                if($i>$breakAfter){
                                                    $i = 1;
                                                    echo "<div class='divider'></div>";
                                                }
                                        ?>
                                        <div class="product-box">
                                            <a href="produto-<?php echo $Produto['id']; ?>">
                                                <img class="product-img" src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/products/<?php echo $Produto['imagem']; ?>">
                                            </a>
                                            <div class="clear">
                                                <div class="pull-left product-info">
                                                    <div class="product-description"><?php echo htmlentities($Produto['descricao'], ENT_NOQUOTES, 'ISO-8859-1'); ?></div>
                                                    <div class="product-price"><?php echo formatMoney($Produto['valor']); ?></div>
                                                </div>
                                                <div class="pull-right">
                                                    <div class="product-color prod-<?php echo $Produto['id']; ?>"></div>
                                                </div>
                                            </div>
                                            <div class="product-buy-btn">
                                                <?php
                                                    $cart = Cart::getItens();
                                                    $cartIds = array_keys($cart);
                                                    $qty = in_array($Produto['id'], $cartIds) ? $cart[$Produto['id']]["qty"]+1 : 1;
                                                ?>
                                                <a href="<?php echo "Processos?product=".$Produto['id']."&qty=".$qty; ?>">COMPRAR</a>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                            echo "<div class='divider'></div>";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Rodapé
            ================================================== -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="well">
                        <footer>
                            <p class="pull-right"><a href="#">Voltar ao in&iacute;cio da p&aacute;gina</a></p>
                            <p>(37) 99922-4238 / 98826-4595 &middot; <a href="mailto:comercial@cdrcamisaria.com.br">comercial@cdrcamisaria.com.br</a></p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>