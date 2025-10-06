<?php
    require_once __DIR__ . '/../../../includes/connection/_inc_db_connect.php';
	
	$CampoAtivo = 'id_empresa';
	
	require_once __DIR__ . '/../../../includes/assets/_inc_header.php';
?>

			<div class="well">
                <label><b>Enviar foto do produto</b></label>
                <form method="post" action="UpLogo" enctype="multipart/form-data">
                    <select name="id_produto" id="id_produto" style="width: 300px;">
						<option value="0">Escolha um produto</option>
						<?php
                            $query = mysql_query("SELECT id, descricao FROM produtos order by descricao");
                                    
                            while($produto = mysql_fetch_array($query)) {
                        ?>
								<option value="<?php echo $produto['id'] ?>"><?php echo $produto['descricao'] ?></option>
                        <?php
                            }
                        ?>
					</select>
					<br>
					<input type="file" name="arquivo" />
					<br><br>
					<button class="btn" type="submit">Enviar</button>
					<button class="btn" type="reset">Apagar</button>
				</form>
			</div>
    </body>
</html>