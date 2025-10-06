<html>
	<?php
		$Subtitle = 'Login';
		
		require_once 'include/assets/_inc_header.php';
	?>
	
	<script type="text/javascript" src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/include/js/functions.js"></script>
	
    <body class="fundo" onload="getfocus('LoginUser');">
	    <div class="container">
			<div class="titulo-login">
				Login
			</div>
			<div class="login">
				<form action="Direcao" method="post">
					<p>
						<div class="text_login">
							Usu&aacute;rio:
						</div>
						<div>
							<input class="input_login" type="text" id="LoginUser" name="LoginUser" />
						</div>
					</p>
					<p>
						<div class="text_login">
							Senha:
						</div>
						<div>
							<input class="input_login" type="password" id="LoginPass" name="LoginPass" />
						</div>
					</p>
					<p>
						<div style="float: right; padding-right: 10px;">
							<input type="submit" value="Entrar" class="button_login">
						</div>
					</p>
				</form>
			</div>
		</div>
    </body>
</html>