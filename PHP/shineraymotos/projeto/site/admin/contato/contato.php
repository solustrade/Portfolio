<?php
	require_once('config.php');
	
	if(sizeof($campoerror)==0 && isset($_POST['formulario'])){
		require_once('enviaemail.php');
	}

	$classaviso = (is_array($aviso)?($aviso['1']?'success aviso':'error aviso'):'none');
	
	$CampoAtivo = '';
?>

<html>
    <head>
	    <meta charset="utf-8">

	    <title>Shineray Motos Divin&oacute;polis - Fale conosco</title>
		
		<link rel="stylesheet" type="text/css" href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/css/contato/estilos.css" />
	</head>
	<body style="background: url('../../images/wall_paper.png');">
		<div class="well-red-1">
			<a href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>" style="text-decoration: none;"><img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/logo.png" border="0" /></a>
		</div>
		<div class="padding">
			<div class="head">
				<div class="header">
					<h1>Mensagem por <span>E-mail</span></h1>
					<p>Responderemos sua mensagem o mais rápido possível. Fique à vontade para perguntar.</p>
				</div>
				<div class="clear"></div>
			</div>
			<hr>
			<div class="<?php echo $classaviso?>">
				<?php
					if(isset($aviso['0'])){
						echo $aviso['0'];
					}
				?>
			</div>
			<div class="col1">
                <div class="map">
                    <!-- Substitua pelas informações do google maps para seu negócio-->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3746.247903922434!2d-44.883222000000025!3d-20.123702700000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa0af9bf59762e5%3A0x23bec11e63aea78!2sR.+Pitangui%2C+291+-+Bom+Pastor%2C+Divin%C3%B3polis+-+MG%2C+35500-151!5e0!3m2!1spt-BR!2sbr!4v1439849721041" width="350" height="225" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <p><span>Telefone:</span>(37) 3214-5719</p>
                <p>E-mail: comercial@shineraymoto.com</p>
            </div>
			<div class="col2">
				<div class="info"><strong>Aviso: </strong>Campos Obrigatórios *</div>
				<form id="senddata" action="" method="post" name="senddata" enctype="multipart/form-data">
					<input type="hidden" name="formulario" value="enviaemail" />
					<?php
						for($i=0;$i<count($arraycampos);$i++){
							//echo (isset($arraycampos[$i][3])?$arraycampos[$i][3]:'');
							$campo = $arraycampos[$i][1];
							$mudacor = (in_array($campo, $campoerror)?$corerro:false);
						
							if(isset($arraycampos[$i][3]) && $arraycampos[$i][3] == 'textarea'){
					?>
								<div class="campo">
									<label for="<?php echo $campo?>">
										<span><?php echo $arraycampos[$i][0].(isset($arraycampos[$i]['obrigatorio']) && $arraycampos[$i]['obrigatorio'] == 1?' * ':'')?>: </span>
									</label>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<br>
									<textarea class="right<?php echo (isset($_POST["$campo"]) && $_POST["$campo"]!=$arraycampos[$i][2]?'':' naopostado').($mudacor?' errorinput':'')?>" name="<?php echo $campo?>" <?php echo (isset($arraycampos[$i][4]['col'])?'cols="'.$arraycampos[$i][4]['col'].'"':'').(isset($arraycampos[$i][4]['rows'])?'rows="'.$arraycampos[$i][4]['rows'].'"':'') ?> onblur="if(this.value==''){this.style.fontStyle='italic';this.style.color='#7f7f7f';this.value='<?php echo $arraycampos[$i][2]?>';}" onfocus="if(this.value=='<?php echo $arraycampos[$i][2]?>'){this.value='';this.style.color='#333';this.style.fontStyle='normal';}else{ if(this.value==''){this.style.fontStyle='italic';this.style.color='#7f7f7f';this.value='<?php echo $arraycampos[$i][2]?>';}}"><?php echo (isset($_POST["$campo"])?$_POST["$campo"]:$arraycampos[$i][2])?></textarea>
									<div class="clear"></div>
								</div>
					<?php
							}
							elseif(isset($arraycampos[$i][3]) && $arraycampos[$i][3] == 'select'){
					?>
								<div class="campo">
									<label for="<?php echo $campo?>">
										<span class="form-txt"><?php echo $arraycampos[$i][0].(isset($arraycampos[$i]['obrigatorio']) && $arraycampos[$i]['obrigatorio'] == 1?' * ':'')?>: </span>
									</label>
									<select <?php echo (isset($_POST["$campo"]) && $_POST["$campo"]!=''?($mudacor?' class="errorinput"':''):' class="naopostado'.($mudacor?' errorinput"':'"'))?> name="<?php echo $campo?>" onblur="if(this.options[this.selectedIndex].value==''){this.style.fontStyle='italic';this.style.color='#7f7f7f';}else{this.style.color='#333';this.style.fontStyle='normal';}">
										<option value=""><?php echo (isset($arraycampos[$i][2])?$arraycampos[$i][2]:'Selecione')?></option>
										<?php
											if(isset($arraycampos[$i]['option'])){
												foreach($arraycampos[$i]['option'] as $k => $v){
										?>
										<option <?php echo (isset($_POST["$campo"])&& $_POST["$campo"] == $k?'selected="selected" ':'')?>value="<?php echo $k ?>"><?php echo $v?></option><?php
												}
											}
										?>
									</select>
								</div>
					<?php
							}elseif(isset($arraycampos[$i][3]) && $arraycampos[$i][3] == 'file'){
					?>
								<div class="campo">
									<label for="<?php echo $campo?>">
										<span class="form-txt"><?php echo $arraycampos[$i][0].(isset($arraycampos[$i]['obrigatorio']) && $arraycampos[$i]['obrigatorio'] == 1?' * ':'')?>: </span>
									</label>
									<input type="file"<?php echo (isset($_POST["$campo"]) && $_POST["$campo"]!=$arraycampos[$i][2]?($mudacor?' class="errorinput"':''):' class="naopostado'.($mudacor?' errorinput"':'"'))?> name="<?php echo $campo?>" onblur="if(this.value==''){this.style.fontStyle='italic';this.style.color='#7f7f7f';this.value='<?php echo $arraycampos[$i][2]?>';}" onfocus="if(this.value=='<?php echo $arraycampos[$i][2]?>'){this.value='';this.style.color='#333';this.style.fontStyle='normal'}" value="<?php echo (isset($_POST["$campo"])?$_POST["$campo"]:$arraycampos[$i][2])?>">
								</div>
					<?php
							}
							else{
					?>
								<div class="campo">
									<label for="<?php echo $campo?>">
										<span class="form-txt"><?php echo $arraycampos[$i][0].(isset($arraycampos[$i]['obrigatorio']) && $arraycampos[$i]['obrigatorio'] == 1?' * ':'')?>: </span>
									</label>
									<input type="text"<?php echo (isset($_POST["$campo"]) && $_POST["$campo"]!=$arraycampos[$i][2]?($mudacor?' class="errorinput"':''):' class="naopostado'.($mudacor?' errorinput"':'"'))?> name="<?php echo $campo?>" onblur="if(this.value==''){this.style.fontStyle='italic';this.style.color='#7f7f7f';this.value='<?php echo $arraycampos[$i][2]?>';}" onfocus="if(this.value=='<?php echo $arraycampos[$i][2]?>'){this.value='';this.style.color='#333';this.style.fontStyle='normal'}" value="<?php echo (isset($_POST["$campo"])?$_POST["$campo"]:$arraycampos[$i][2])?>">
								</div>
					<?php
							}
						}
					?>
					<div class="campo">
						<input type="submit" name="Enviar" value="Enviar" />
					</div>
                    <div class="clear"></div>
				</form>
			</div>
			<div class="clear"></div>
			<hr>
		</div>
		<div class="footer-red-1">
			<p style="color: #fff;">Desenvolvido por <a target="_blank" class="link" href="http://www.psbios.com">PSBios IT Solutions</a></p>
		</div>
	</body>
</html>