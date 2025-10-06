<?php
	require_once __DIR__ . '/includes/connection/_inc_db_connect.php';
    require_once __DIR__ . '/includes/init.inc.php';

	$itens = Cart::getItens();
	$freight = isset($_SESSION['freight'][0]) ? $_SESSION['freight'][0] : 0;
	$time = isset($_SESSION['freight'][1]) && $_SESSION['freight'][0]<>0 ? $_SESSION['freight'][1] : '-';
	$freightErr = isset($_SESSION['cep_destination']) && $_SESSION['cep_destination'] <> "" && isset($_SESSION['freight'][1]) && $_SESSION['freight'][0]==0 ?  $_SESSION['freight'][1] : '';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" href="./includes/css/style.css" />
		<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<script language="JavaScript" type="text/javascript" src="includes/js/loja/masks.js"></script>
		
		<title>Carrinho de compras</title>
	</head>
	<body>
		<?php include "includes/header.inc.php"; ?>

		<div class="cart">
			<div class="cart-content">
				<h1>CARRINHO</h1><br>

				<?php if(count($itens)>0){ ?>

				<div class="overview cbox">
					<div class="title">Resumo da compra</div>
					<div class="clear columns">
						<div class="pull-left column-51">Itens</div>
						<div class="pull-left column-15 text-center">Quantidade</div>
						<div class="pull-left column-15 text-center">Valor</div>
						<div class="pull-right column-15 text-center">Total (R$)</div>
					</div>
					<div class="itens-list">
					
						<?php foreach($itens as $i){ ?>

						<div class="item-box clear">
							<div class="pull-left column-51"><a href="<?php echo "./produto-".$i["prod"]->id; ?>"><?php echo $i["prod"]->description; ?></a></div>
							<div class="pull-left column-16 text-center">
								<div>
									<div class="change-qty-link">
										<a href="<?php echo "Processos?product=".$i["prod"]->id."&qty=".($i["qty"]-1); ?>">
											<img src="./images/loja/arrow-down.png" />
										</a>
									</div>
									<input class="input-qty" type="text" disabled="disabled" value="<?php echo $i["qty"]; ?>" />
									<div class="change-qty-link">
										<a href="<?php echo "Processos?product=".$i["prod"]->id."&qty=".($i["qty"]+1); ?>">
											<img src="./images/loja/arrow-up.png" />
										</a>
									</div>
								</div>
								<a class="remove" href="<?php echo "Processos?product=".$i["prod"]->id."&qty=0"; ?>">Remover</a>
							</div>
							<div class="pull-left column-16 text-center"><?php echo formatMoney($i["prod"]->price); ?></div>
							<div class="pull-left column-16 text-right text-bold"><?php echo formatMoney($i["total"]); ?></div>
						</div>

						<?php }	?>

					</div>
					<div class="info-line">
						<div class="text-right color-orange"><?php echo $freightErr; ?></div>
						<div class="clear vmargin">
							<div class="pull-right value"><?php echo formatMoney((double)$freight); ?></div>
							<div class="pull-right value">Frete</div>
							<div class="pull-right">
								<form action="CalculaFrete" method="get">
									<span>Informe seu CEP</span>
									<input type="text" id="cep_destination" name="cep_destination" class="input" OnKeyUp="format('#####-###', this)" maxlength="9" value='<?php echo isset($_SESSION['cep_destination']) ? $_SESSION['cep_destination'] : ''; ?>' />
									<input type="submit" class='button' value="Calcular" />
								</form>
							</div>
						</div>
						<div class="clear">
							<div class="pull-right value"><?php echo $time; ?></div>
							<div class="pull-right">Prazo de entrega</div>
						</div>
					</div>
					<div class="clear info-line info-line-blue">
						<div class="pull-right value">R$ 0,00</div>
						<div class="pull-right">Desconto</div>
					</div>
					<div class="clear info-line">
						<div class="pull-right value">R$ 1,50</div>
						<div class="pull-right">Taxa de administração de risco. <a href="" title="A taxa de administração de risco (cobrada pela Gerencianet) garante a segurança da sua compra. Assim, caso ocorra algum problema com a entrega do seu pedido, é possível iniciar uma disputa na Gerencianet e solicitar a devolução do valor pago.">Entenda.</a></div>
					</div>

					<div class="clear total">
						<div class="pull-right value"><?php echo formatMoney(Cart::getTotalPriceWithTaxes()); ?></div>
						<div class="pull-right">Valor total:</div>
					</div>
				</div>

				<?php } else { ?>

				<div class="empty cbox">
					<div class="clear">
						<div class="pull-left logo">
							<img src="./images/loja/shop-cart-icon.png" />
						</div>
						<div class="pull-right message">
							<h2>Não há produtos em seu carrinho</h2>
							<p>Para inserir algum produto no seu carrinho, navegue pelos departamentos ou utilize a busca do site.
								Ao encontrar os itens desejados, clique no botão EU QUERO! localizado na página do produto.</p>
							</div>
						</div>
					</div>

				<?php } ?>

					<div class="clear">
						<div class="pull-left">
							<a href="./" class="btn">Continuar comprando</a>
						</div>

						<?php 
						if(count($itens) > 0){
							echo "<div class='pull-right'>";
							$warnings = Cart::getWarnings();
						
							if(count($warnings) > 0){
								echo "<div class='warning'>" . $warnings[0] . "</div>";
							} else {
								echo "<a href='./pagamento' class='btn btn-green'>Concluir compra</a>";
							}
							
							echo "</div>"; 
						}	
						?>
					</div>
				</div>

				<div class="other-prds">
					<div class="content">
						<div class="title">PESSOAS VIRAM TAMBÉM</div>
						<div class="clear list">
							<?php
								$otherPrdIds = array();
							
								for($i=0; $i<4; $i++){
									$pid = mt_rand(1,100);
								
									if (!in_array($pid, $otherPrdIds)) {
										$otherPrdIds[] = $pid;
									
										$p = Product::getProductById($pid);
									}
								
									/*while(in_array($pid=mt_rand(1,100), $otherPrdIds));
									$otherPrdIds[] = $pid;
									$p = Product::getProductById($pid);*/

							?>
							
							<div class="pull-left item">
								<a href="./produto-<?php echo $p->id; ?>"><img src="<?php echo $p->img; ?>" /></a>
							</div>
							
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>

			<?php include "includes/footer.inc.php"; ?>
	</body>
</html>