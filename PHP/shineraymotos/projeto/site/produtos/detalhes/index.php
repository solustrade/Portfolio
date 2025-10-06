<?php
    $Produto = $_REQUEST['IdProduto'];
    $Tipo    = $_REQUEST['IdTipo'];
    
    require_once __DIR__ . '/../../includes/init.inc.php';
    
    $mySQL      = new DB;
    $CampoAtivo = '';
    
    require_once __DIR__ . '/../../includes/assets/_inc_header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Shineray Motos Divin&oacute;polis - Detalhes do produto</title>

        <link rel="stylesheet" type="text/css" href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/css/abas/estilo.css" />

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/abas/javascript.js"></script>
    </head>

        <div class="global-div">
            <div class="row-fluid">
                <div class="span8">
                    <div class="well" style="overflow: hidden;">
                        <?php
                            $query = $mySQL->executeQuery("select descricao, foto FROM produtos where id = '$Produto' and tipo = '$Tipo'");
                
                            while($produto = mysqli_fetch_array($query)) {
                        ?>
            
                        <div class="section title">
                            <h2 style="color: #9F0C11; font-size: 40px;"><?php echo $produto['descricao']; ?></h2>
                            <hr>
                        </div>
                        <h1>
                            <div style="width: 580px; height: 460px;">
                                <?php
                                    if ($Tipo == 1) {
                                ?>
                                        <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/ciclomotores/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                                <?php
                                    }
                                    else if ($Tipo == 2) {
                                ?>
                                        <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/motocicletas/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                                <?php
                                    }
                                    else if ($Tipo == 3) {
                                ?>
                                        <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/triciclos/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                                <?php
                                    }
                                    else if ($Tipo == 4) {
                                ?>
                                        <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/quadriciclos/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                                <?php
                                    }
                                ?>
                            </div>
                        </h1>
            
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="span4">
                    <div class="well" style="overflow: hidden;">
                        <h2>Fotos</h2>
                        <hr>
                        
                        <?php
                            $query = $mySQL->executeQuery("select * FROM fotos where id_produto = '$Produto'");
                
                            $contador = 1;
                            
                            while($fotos = mysqli_fetch_array($query)) {
                        ?>
                        
                                <div style="width: 116px; height: 92px; display: inline-block; padding: 2px;">
                                    <?php
                                        if ($Tipo == 1) {
                                    ?>
                                            <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/ciclomotores/<?php echo $fotos['foto']; ?>" style="width: 128px; height: 128px;">
                                    <?php
                                        }
                                        else if ($Tipo == 2) {
                                    ?>
                                            <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/motocicletas/<?php echo $fotos['foto']; ?>" style="width: 128px; height: 128px;">
                                    <?php
                                        }
                                        else if ($Tipo == 3) {
                                    ?>
                                            <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/triciclos/<?php echo $fotos['foto']; ?>" style="width: 128px; height: 128px;">
                                    <?php
                                        }
                                        else if ($Tipo == 4) {
                                    ?>
                                            <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/quadriciclos/<?php echo $fotos['foto']; ?>" style="width: 128px; height: 128px;">
                                    <?php
                                        }
                                    ?>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

            <ul class="abas">
                <li><a href="#noticia1">Motor</a></li>
                <li><a href="#noticia2">Capacidades</a></li>
                <li><a href="#noticia3">Chassi</a></li>
                <li><a href="#noticia4">Dimens&otilde;es</a></li>
                <li><a href="#noticia5">Atributos</a></li>
                <li><a href="#noticia6">Manual</a></li>
            </ul>

            <div id="noticia"></div>

            <div id="conteudo">
                <div id="noticia1">
                    <?php
                        $query = $mySQL->executeQuery("select * FROM motor where id_produto = '$Produto'");
                
                        while($motor = mysqli_fetch_array($query)) {
                    ?>
                    
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Rela&ccedil;&atilde;o de compress&atilde;o</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($motor['relacao'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Di&acirc;metro X Curso</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($motor['diametro'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Cilindrada</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($motor['cilindrada'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Tipo de motor</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($motor['tipo'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>C&acirc;mbio</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($motor['cambio'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Embreagem</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($motor['embreagem'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Sistema de partida</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($motor['partida'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Transmiss&atilde;o</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($motor['transmissao'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Alimenta&ccedil;&atilde;o</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($motor['alimentacao'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Torque m&aacute;ximo</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($motor['torque'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Pot&ecirc;ncia m&aacute;xima</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($motor['potencia'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
    
                <div id="noticia2">
                    <?php
                        $query = $mySQL->executeQuery("select * FROM capacidades where id_produto = '$Produto'");
                
                        while($capacidades = mysqli_fetch_array($query)) {
                    ?>
                    
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>&Oacute;leo o amortecedor</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($capacidades['oleo_amort'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Farol</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($capacidades['farol'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Bateria</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($capacidades['bateria'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Idni&ccedil;&atilde;o</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($capacidades['ignicao'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>&Oacute;leo o motor (total)</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($capacidades['oleo_motor'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Tanque de combust&iacute;vel</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($capacidades['tanque'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
    
                <div id="noticia3">
                    <?php
                        $query = $mySQL->executeQuery("select * FROM chassi where id_produto = '$Produto'");
                
                        while($chassi = mysqli_fetch_array($query)) {
                    ?>
                    
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Roda traseira</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($chassi['roda_traseira'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Roda dianteira</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($chassi['roda_dianteira'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Pneu traseiro/di&acirc;metro</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($chassi['pneu_traseiro'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Pneu dianteiro/di&acirc;metro</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($chassi['pneu_dianteiro'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Freio traseiro/di&acirc;metro</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($chassi['freio_traseiro'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Freio dianteiro/di&acirc;metro</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($chassi['freio_dianteiro'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Suspens&atilde;o traseira/curso</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($chassi['susp_traseira'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Suspens&atilde;o dianteira/curso</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($chassi['susp_dianteira'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Tipo de chassi</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($chassi['tipo_chassi'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Tipo de roda</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($chassi['tipo_roda'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Balan&ccedil;a</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($chassi['balanca'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
    
                <div id="noticia4">
                    <?php
                        $query = $mySQL->executeQuery("select * FROM dimensoes where id_produto = '$Produto'");
                
                        while($dimensoes = mysqli_fetch_array($query)) {
                    ?>
                    
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Dist&acirc;ncia do solo</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($dimensoes['distancia_solo'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Dist&acirc;ncia entre eixos</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($dimensoes['distancia_eixos'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Altura</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($dimensoes['altura'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Largura</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($dimensoes['largura'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Comprimento</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($dimensoes['comprimento'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-sim">
                                <span>Peso seco</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-sim">
                                <span><?php echo htmlentities($dimensoes['peso'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="zebra-nao">
                                <span>Altura assento</span>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="zebra-nao">
                                <span><?php echo htmlentities($dimensoes['altura_assento'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
    
                <div id="noticia5">
                    <?php
                        $zebra    = 'sim';
                        $contador = 0;
                        
                        $query = $mySQL->executeQuery("select * FROM atributos where id_produto = '$Produto'");
                    
                        while($atributos = mysqli_fetch_array($query)) {
                            if ($contador < 1) {
                    ?>
                                <div class="row-fluid">
                    <?php
                            }
                    ?>
                            <div class="span6">
                    <?php
                                    if ($zebra == 'nao') {
                                        $zebra = 'sim';
                                    }
                                    else if ($zebra == 'sim') {
                                        $zebra = 'nao';
                                    }
                    ?>
                                <div class="zebra-<?php echo $zebra; ?>">
                                    <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/item.png">&nbsp;&nbsp;<span><?php echo htmlentities($atributos['atributo'], ENT_NOQUOTES, 'ISO-8859-1'); ?></span>
                                </div>
                            </div>
                            
                    <?php
                            $contador += 1;
                            
                            if ($contador == 2) {
                                $contador = 0;
                    ?>
                                </div>
                    <?php
                            }
                        }
                        
                        if ($contador < 2) {
                    ?>
                    
                            </div>
                    
                    <?php
                        }
                    ?>
                </div>
    
                <div id="noticia6">
                    <div class="zebra-sim">
                        <span>Manual do propriet&aacute;rio</span>
                    </div>
                    <div class="zebra-nao" style="padding-left: 10px;">
                        <span>Para Fazer o download do Manual do Propriet&acute;rio, clique no link abaixo:</span>
                        
                        <div class="row-fluid">
                            <div class="span2">
                                <?php
                                    $query = $mySQL->executeQuery("select foto FROM produtos where id = '$Produto' and tipo = '$Tipo'");
                
                                    while($produto = mysqli_fetch_array($query)) {
                                ?>
            
                                <h1>
                                    <div style="width: 145px; height: 115px;">
                                        <?php
                                            if ($Tipo == 1) {
                                        ?>
                                                <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/ciclomotores/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                                        <?php
                                            }
                                            else if ($Tipo == 2) {
                                        ?>
                                                <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/motocicletas/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                                        <?php
                                            }
                                            else if ($Tipo == 3) {
                                        ?>
                                                <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/triciclos/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                                        <?php
                                            }
                                            else if ($Tipo == 4) {
                                        ?>
                                                <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/produtos/quadriciclos/<?php echo $produto['foto']; ?>" style="width: 100%; height: 100%;">
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </h1>
            
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="span8">
                                <?php
                                    $query = $mySQL->executeQuery("select descricao, nome_arquivo FROM manual where id_produto = '$Produto'");
                
                                    while($manual = mysqli_fetch_array($query)) {
                                ?>
                                     <br><br>
                                     <a href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/manuais/<?php echo $manual['nome_arquivo']; ?>">
                                        <span style="font-size: 20px;"><?php echo $manual['descricao']; ?></span>
                                     </a>   
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>