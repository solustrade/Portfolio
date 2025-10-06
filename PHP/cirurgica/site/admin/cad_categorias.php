<html>
	<?php
        $Subtitle = 'Categorias';
        
        require_once '../include/assets/_inc_header.php';
    ?>
    
    <body class="fundo">
        <div class="menu_esquerdo">
			<p class="itemSelecionado">Categorias</p>
            <p><a class="itemMenu" role="menuitem" tabindex="-1" href="Produtos">Produtos</a></p>
            <p><a class="itemMenu" role="menuitem" tabindex="-1" href="Banner">Banner</a></p>
            <p><a class="itemMenu" role="menuitem" tabindex="-1" href="Empresa">Empresa</a></p>
		</div>
		
		<div class="EntradaDados">
			<h1 class="TituloEntradaDados">
				Categorias
			</h1>
					
			<hr>
			
			<?php require_once '../include/init.inc.php'; ?>
			
			<table class="Grid">
				<th class="Celula">
					A&ccedil;&otilde;es
				</th>
				<th class="Celula">
					C&oacute;digo
				</th>
				<th class="Celula">
					Descri&ccedil;&atilde;o
				</th>
						
				<?php
					$mySQL = new DB;
	
					$query = $mySQL->executeQuery("SELECT codigo, descricao FROM categorias order by descricao");
					
					while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				?>
						
				<tr>
					<td class="Celula">
						<div class="Acoes">
							<a class="LinkAcoes" href="Attributes?Type=0&Code=<?php echo $row['codigo']; ?>">Ver</a>
						</div>
						<div class="Acoes">
							<a class="LinkAcoes" href="Attributes?Type=1&Code=<?php echo $row['codigo']; ?>">Editar
						</div>
						<div class="Acoes">
							<a class="LinkAcoes" href="Attributes?Type=2&Code=<?php echo $row['codigo']; ?>">Excluir
						</div>
					</td>
					<td class="Celula">
						<?php echo $row['codigo']; ?>
					</td>
					<td class="Celula">
						<?php echo htmlentities($row['descricao'], ENT_NOQUOTES, 'ISO-8859-1'); ?>
					</td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
    </body>
</html>