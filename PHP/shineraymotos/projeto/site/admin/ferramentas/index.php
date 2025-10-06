<?php
    require_once __DIR__ . '/../../includes/init.inc.php';
	
    $mySQL      = new DB;
    $CampoAtivo = '';
    
    require_once __DIR__ . '/../../includes/assets/_inc_header.php';
?>

        <script type="text/javascript">
			function drawColorPalette(stageID, callback) {
				var listColor = ["00", "33", "66", "99", "CC", "FF"];
				var table = document.createElement("table");
						
				table.border = 1;
				table.cellPadding = 0;
				table.cellSpacing = 0;
				table.style.borderColor = "#666666";
				table.style.borderCollapse = "collapse";
						
				var tr, td;
				var color = "";
				var tbody = document.createElement("tbody");
						
				for (var i = 0; i < listColor.length; i++){
					tr = document.createElement("tr");
							
					for (var x = 0; x < listColor.length; x++) {
						for (var y = 0; y < listColor.length; y++) {
							color = "#"+listColor[i]+listColor[x]+listColor[y];
							td = document.createElement("td");
							td.style.width = "11px";
							td.style.height = "11px";
							td.style.background = color;
							td.color = color;
							td.style.borderColor = "#000";
							td.style.cursor = "pointer";
               
							if (typeof(callback) == "function") {
								td.onclick = function() {
									callback.apply(this, [this.color]);
								}
							}
									
							tr.appendChild(td); 
						}
					}
        
					tbody.appendChild(tr);
				}  
    
				table.appendChild(tbody);
				var element = document.getElementById(stageID);
    
				if (element) element.appendChild(table);
					return table;
			}
 
			window.onload = function() {
				drawColorPalette("mydiv", function(color) {
					//document.getElementById("textcolor").innerHTML = color;
					document.getElementById("Color1").value = color;
				}); 
			}
		</script>
		
		<div class="well" style="overflow: hidden;">
			<label><b>Escolha a cor do produto</b></label>
			<div id="mydiv"></div>
			<br>
			
			<?php
				$query = $mySQL->executeQuery("SELECT id, descricao FROM produtos order by descricao");
			?>
			
			<label><b>Enviar imagem do produto</b></label>
			
			<form method="post" action="UpImage" enctype="multipart/form-data">
				<label>Cor escolhida:</label><input type="text" name="Color1" id="Color1" /><br>
				<label>Produto:</label><select name="id_produto" id="id_produto" style="width: 200px;">
					<option value="0">Selecione um produto</option>
					<?php
						while($produto = mysqli_fetch_array($query)) {
					?>
					
					<option value="<?php echo $produto['id']; ?>"><?php echo $produto['descricao']; ?></option>
							
					<?php
						}
					?>
				</select>
				<br>
				<input class="btn" type="file" name="arquivo" />
				<br><br>
				<button class="btn" type="submit">Enviar</button>
				<button class="btn" type="reset">Apagar</button>
			</form>
		</div>
    </body>
</html>