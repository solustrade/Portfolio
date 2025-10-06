<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	
	require_once 'include/init.inc.php';
	
	$Categoria = $_REQUEST['V4lC4t'];
    
    if ($Categoria == '') {
		$mySQL = new DB;
		$query = $mySQL->executeQuery("SELECT codigo FROM categorias order by codigo");
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
				
		$Categoria = $row['codigo'];
    }
	
	clearstatcache ();
	
	$mySQL = new DB;
	
	$query = $mySQL->executeQuery("SELECT imagem FROM produtos where categoria = $Categoria");
?>  
<html>
	<?php
		$Subtitle = 'In&iacute;cio';
		
		require_once 'include/assets/_inc_header.php';
	?>
	
	<script type="text/javascript">
		function preload() {
			imgs = new Array ();
				
			<?php
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
			?>
					imgs.push('<?php echo $row['imagem']; ?>');
            <?php
				}
			?>
			
			imgQtde = imgs.length;
                
            for (i = 0; i <= imgQtde; i++) {
				var preloadImg = new Image();
                preloadImg.src = imgs[i];
            }
        }
            
        function IniciaSlider() {
			preload();
				
            max = imgQtde;
            min = 0;
            Ii  = min;
            tr  = true;
                
            CarregaImagem(imgs[0]);
            
			document.getElementById("produtos").addEventListener("transitionend", EndTransition);
                
            tmr = setInterval(TrocaImagem, 4000);
        }
            
        function TrocaImagem() {
            tr = false;
            Ii++;
                
            if (Ii > max) {
				Ii = min;
            }
                
            CarregaImagem(imgs[Ii]);
        }
            
        function EndTransition(args) {
			tr = true;
        }
            
        function CarregaImagem(imagem) {
			document.getElementById("produtos").style.backgroundImage='url("'+imagem+'")';
        }
            
        function Troca(dr) {
			clearInterval(tmr);
                
            if (tr) {
				tr = false;
                Ii += dr;
                
                if (Ii > max) {
					Ii = min;
                }
                    
                if (Ii < min) {
					Ii = max;
                }
                
                CarregaImagem(imgs[Ii]);
            }
                
            tmr = setInterval(TrocaImagem, 4000);
        }
	</script>
	
	<body class="fundo" onload="IniciaSlider()">
		<div class="categorias">
			<br>
			<?php
				$mySQL = new DB;
				$query = $mySQL->executeQuery("SELECT codigo, icone, descricao FROM categorias order by posicao");
				//$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
				
				while($icone = mysqli_fetch_array($query)) {
			?>
					<p>
						<img class="imgCateg" src="<?php echo $icone['icone']; ?>">
						<a class="itemCateg" role="menuitem" tabindex="-1" href="?V4lC4t=<?php echo $icone['codigo'] ?>">
							<?php echo htmlentities($icone['descricao'], ENT_NOQUOTES, 'ISO-8859-1'); ?>
						</a>
					</p>
			<?php
				}
			?>
		</div>
		
		<div class="titulo-mapa">
			Onde estamos
		</div>
		<div class="mapa">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3745.8355665556096!2d-44.88696375211487!3d-20.14090652700674!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa0a5792e171663%3A0x1fa9f4b3af542d86!2sAv.+Get%C3%BAlio+Vargas%2C+835+-+Centro%2C+Divin%C3%B3polis+-+MG%2C+35500-024!5e0!3m2!1spt-BR!2sbr!4v1445606368927" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
			<br><br>
			<?php
				$mySQL = new DB;
				$query = $mySQL->executeQuery("SELECT tel, email, whatsapp FROM empresa");
				$row   = mysqli_fetch_array($query, MYSQLI_ASSOC);
			?>
			
			<span>
				<b>Telefone:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['tel']; ?>
				<br>
				<b>Whatsapp:</b>&nbsp;<?php echo $row['whatsapp']; ?>
				<br><br>
				<?php echo $row['email']; ?>
			</span>
		</div>
			
		<div class="titulo-sobre-nos">
			Sobre n&oacute;s
		</div>
		<div class="sobre-nos">
			<p>Na Cir&uacute;rgica Divin&oacute;polis voc&ecirc; encontra os mais variados produtos para a sua sa&uacute;de e de sua fam&iacute;lia.
			Linha completa em ortopedia, fisioterapia, conforto para os p&eacute;s, acess&oacute;rios para acamados, massageadores, materiais e
			vestu&aacute;rio para profissionais e estudantes da &aacute;rea da sa&uacute;de, al&eacute;m de uma grade completa de meias de compress&atilde;o,
			cadeiras de rodas e banho. Atendemos tamb&eacute;m cl&iacute;nicas e consult&oacute;rios com produtos de consumo para o dia a dia.</p>
			<p>Contamos com profissionais capacitados para lhe oferecer o melhor atendimento focando em suas principais necessidades.</p>
			Venha nos conhecer!
		</div>
			
		<!--<div class="banner"></div>-->
			
		<div id="produtos">
			<div class="seta_esquerda">
				<input type="image" src="/images/slide/backward.png" onclick="Troca(-1)" />
			</div>
			<div class="seta_direita">
				<input type="image" src="/images/slide/forward.png" onclick="Troca(1)" />
			</div>
		</div>
    </body>
</html>