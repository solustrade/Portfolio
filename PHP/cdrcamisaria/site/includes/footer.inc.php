<?php
	require_once './includes/connection/_inc_db_connect.php';
?>

<div class="search">
	<p>
		<label class="text-bold text-italic info">Busque produtos por palavras chave</label>
		<input type="text" class="input-search" />
		<input type="image" src="./images/loja/icon-search.png" class="image-button" />
	</p>
</div>

<div class="footer"> <!--zigzag">-->
	<div class="content">
		<div class="list">
			<p class="title text-bold">CATEGORIAS</p>
			
			<?php
				$query = mysql_query("SELECT id, conteudo, valor FROM categorias order by posicao");
                                                
                while($categoria = mysql_fetch_array($query)) {
			?>
			
			<ul>
				<li><a href="" class="link"><?php echo htmlentities($categoria['conteudo'], ENT_NOQUOTES, 'ISO-8859-1') ?></a></li>
			</ul>
			
			<?php
				}
			?>
		</div>
		<div class="list">
			<p class="title text-bold">DÚVIDAS?</p>
			<ul>
				<li><a href="" class="link">COMO COMPRAR</a></li>
				<li><a href="" class="link">PRAZOS DE ENTREGA</a></li>
				<li><a href="" class="link">TROCAS E DEVOLUÇÕES</a></li>
				<li><a href="" class="link">FORMAS DE PAGAMENTO</a></li>
				<li><a href="" class="link">ACOMPANHAR PEDIDO</a></li>
				<li><a href="" class="link">SEGURANÇA</a></li>
				<li><a href="" class="link">LOCALIZAÇÃO</a></li>
				<li><a href="" class="link">TRABALHE CONOSCO</a></li>
			</ul>
		</div>
		<div class="list">
			<p class="title text-bold">CONTATO</p>
			<ul>
				<li><label class="contact text-bold">(37) 99922-4238 / 98826-4595</label></li>
				<li><label class="contact text-bold">comercial@cdrcamisaria.com.br</label></li>
				<li><img src="./images/loja/icones-redes-sociais.png" /></li>
			</ul>
		</div>
	</div>
</div>