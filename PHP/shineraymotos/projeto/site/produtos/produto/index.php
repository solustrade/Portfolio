<?php
  require_once __DIR__ . '/../../includes/init.inc.php';
    
  $mySQL      = new DB;
  $CampoAtivo = '';
  
  $TipoProd = $_REQUEST['id'];
    
  require_once __DIR__ . '/../../includes/assets/_inc_header.php';
?>

        <div class="row-fluid">
            <div class="well">
                <div class="section title">
                    <?php
                        if ($TipoProd == 1) {
                    ?>
                        <h2 style="color: #9F0C11; font-size: 40px;">Ciclomotores</h2>
                    <?php
                        }
                        else if ($TipoProd == 2) {
                    ?>
                        <h2 style="color: #9F0C11; font-size: 40px;">Motocicletas</h2>
                    <?php
                        }
                        else if ($TipoProd == 3) {
                    ?>
                        <h2 style="color: #9F0C11; font-size: 40px;">Triciclos</h2>
                    <?php
                        }
                        else if ($TipoProd == 4) {
                    ?>
                        <h2 style="color: #9F0C11; font-size: 40px;">Quadriciclos</h2>
                    <?php
                        }
                    ?>
                    
                    <hr>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="well" style="overflow: hidden; background: #FFFFFF;">
                <?php
                    if ($TipoProd == 1) {
                        $query = $mySQL->executeQuery("select id, tipo, descricao, preco1, preco2, foto FROM produtos where tipo = 1");
                    }
                    else if ($TipoProd == 2) {
                        $query = $mySQL->executeQuery("select id, tipo, descricao, preco1, preco2, foto FROM produtos where tipo = 2");
                    }
                    else if ($TipoProd == 3) {
                        $query = $mySQL->executeQuery("select id, tipo, descricao, preco1, preco2, foto FROM produtos where tipo = 3");
                    }
                    else if ($TipoProd == 4) {
                        $query = $mySQL->executeQuery("select id, tipo, descricao, preco1, preco2, foto FROM produtos where tipo = 4");
                    }
                                    
                    while($produto = mysqli_fetch_array($query)) {
                ?>
                <div style="width: 260px; height: 230px; display: inline-block; padding-left: 25px; padding-right: 10px; padding-bottom: 10px;">
                    <a href="Detalhes?IdProduto=<?php echo $produto['id']; ?>&IdTipo=<?php echo $produto['tipo']; ?>" target="_self" style="text-decoration: none;">
                        <?php
                            if ($TipoProd == 1) {
                        ?>
                            <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/ciclomotores/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                        <?php
                            }
                            else if ($TipoProd == 2) {
                        ?>
                            <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/motocicletas/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                        <?php
                            }
                            else if ($TipoProd == 3) {
                        ?>
                            <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/triciclos/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                        <?php
                            }
                            else if ($TipoProd == 4) {
                        ?>
                            <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/quadriciclos/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                        <?php
                            }
                        ?>
                        <br>
                        <p style="font-family: !important; font-size: 20px; color: #B22222; padding-left: 20px;"><?php echo $produto['descricao']; ?></p>
                        <?php
                            if ($produto['preco2'] > 0) {
                        ?>
                            <p style="font-family: !important; font-size: 15px; color: #000000; padding-left: 20px;"><?php echo '<b>Pre&ccedil;o: <strike>R$ ' . $produto['preco1'] . '</strike></b>'; ?></p>
                            <p style="font-family: !important; font-size: 15px; color: #000000; padding-left: 20px;"><?php echo '<b>Promo&ccedil;&atilde;o: R$ ' . $produto['preco2'] . '</b>'; ?></p>
                        <?php
                            }
                            else {
                        ?>
                            <p style="font-family: !important; font-size: 15px; color: #000000; padding-left: 20px;"><?php echo '<b>Pre&ccedil;o: R$ ' . $produto['preco1'] . '</b>'; ?></p>
                            <p> </p>
                        <?php
                            }
                        ?>
                        <p style="font-family: !important; font-size: 15px; color: #696969; padding-left: 20px;">SAIBA MAIS</p>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
      </div>
  </body>
</html>