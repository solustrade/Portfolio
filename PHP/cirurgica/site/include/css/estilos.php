<?php
    // Define que o arquivo terá a codificação de saída no formato CSS
    header("Content-type: text/css");

    $imagem_link = 'http://' . $_SERVER['HTTP_HOST'] . '/images/fundo_1.png';
	$banner_link = 'http://' . $_SERVER['HTTP_HOST'] . '/images/banner.png';
	$logo_link   = 'http://' . $_SERVER['HTTP_HOST'] . '/images/logo.png';
?>

.fundo {
	background-color: #fff; /*#8E0021;*/
}

.logo {
	position: fixed;
	z-index: 10;
	top: 0;
	left: 0;
	width: 10%;
	height: 100px;
	background-color: #ccc;
	overflow: hidden;
	
	text-align: center;
	font-size: 25px;
	
	background-image: url('<?php echo $logo_link; ?>');
	background-repeat: no-repeat;
}

.categorias {
	position: fixed;
	z-index: 10;
	top: 152px;
	left: 4px;
	width: 15%;
	height: 75%;
	background-color: #ccc;
	overflow: auto;
	
	font-size: 90%;
	
	border: 1px solid #000;
	border-radius: 5px;
	
	padding-left: 15px;
}

.itemCateg {
	text-decoration: none;
	color: #000;
	
	/*font-size: 12px;*/
	font-weight: bold;
	
	line-height: 24px;
	
	padding-left: 30px;
}

.itemCateg:hover {
	color: #fff;
}

.imgCateg {
	position: absolute;

	width: 24px;
	height: 24px;
	
	border-radius: 5px;
}

.menu_esquerdo {
	position: fixed;
	z-index: 10;
	top: 152px;
	left: 4px;
	width: 12%;
	height: 75%;
	background-color: #FFFFE0;
	overflow: auto;
	
	font-size: 90%;
	
	border: 1px solid #000;
	border-radius: 5px;
}

.itemMenu {
	text-decoration: none;
	color: #000;
	
	font-family: monospace;
	font-size: 16px;
	font-weight: bold;
	
	line-height: 16px;
	
	padding-left: 10px;
}

.itemMenu:hover {
	color: #FF0000;
}

.ItemSelecionado {
	font-family: monospace;
	font-size: 16px;
	font-weight: bold;
	
	line-height: 16px;
	
	padding-left: 10px;
	
	color: #FF0000;
}

.EntradaDados {
	position: fixed;
	z-index: 10;
	top: 152px;
	left: 13%;
	width: 70%;
	height: 75%;
	background-color: #FFFFE0;
	overflow: auto;
	
	font-size: 90%;
	
	padding: 5px 15px 0 15px;
	
	border: 1px solid #000;
	border-radius: 5px;
}

.TituloEntradaDados {
	font-family: serif;
	color: #000;
	
	padding-left: 15px;
}

.Grid {
	border: 1px solid #000;
}

.Celula {
	border: 1px solid #000;
	
	text-align: center;
	
	padding: 2px 5px 2px 5px;
}

.Acoes {
	float: left;
	border: 1px solid #000;
	
	text-align: center;
	
	padding: 0 5px 0 5px;
	
	margin-left: 2px;
	
	color: #CD0000;
}

.LinkAcoes {
	text-decoration: none;
	
	color: #CD0000;
}

.LinkAcoes:hover {
	text-decoration: underline;
}

.ManutDados {
	position: fixed;
	z-index: 10;
	top: 152px;
	left: 4px;
	width: 80%;
	height: 75%;
	background-color: #FFFFE0;
	overflow: auto;
	
	font-size: 90%;
	
	border: 1px solid #000;
	border-radius: 5px;
	
	padding: 15px;
}

.titulo-mapa {
	position: fixed;
	
	z-index: 10;
	overflow: auto;
	
	top: 152px;
	left: 17.5%;
	width: 30%;
	height: 30px;
	
	background-color: #ccc;
	
	text-shadow: #000 1px -1px, #000 -1px 1px, #000 1px 1px, #000 -1px -1px;
	color: #ffb902;
	font-family: fantasy;
	font-size: 20px;
    
    padding: 5px;
	
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	
	border: 2px solid #ffb902;
}

.mapa {
	position: fixed;
	z-index: 10;
	top: 192px;
	left: 17.5%;
	width: 30%;
	height: 240px;
	background-color: #ccc;
	overflow: auto;
	
	text-align: left;
	color: #000;
	font-size: 16px;
	padding: 5px;
	/*font-weight: bold;*/
	
	border-bottom-left-radius: 5px;
	border-bottom-right-radius: 5px;
	
	border: 2px solid #ffb902;
}

.titulo-sobre-nos {
	position: fixed;
	
	z-index: 10;
	overflow: auto;
	
	top: 452px;
	left: 17.5%;
	width: 30%;
	height: 30px;
	
	background-color: #ccc;
	
	text-shadow: #000 1px -1px, #000 -1px 1px, #000 1px 1px, #000 -1px -1px;
	color: #ffb902;
	font-family: fantasy;
	font-size: 20px;
    
    padding: 5px;
	
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	
	border: 2px solid #ffb902;
}

.sobre-nos {
	position: fixed;
	z-index: 10;
	top: 492px;
	left: 17.5%;
	width: 30%;
	height: 20%;
	background-color: #ccc;
	overflow: auto;
	
	text-align: justify;
	color: #000;
	font-size: 13px;
	font-family: sans-serif;
	font-weight: bold;
		
	padding: 5px;
		
	border-bottom-left-radius: 5px;
	border-bottom-right-radius: 5px;
	
	border: 2px solid #ffb902;
}

.NavBar {
	position: fixed;
	z-index: 10;
	top: 0;
	left: 4px;
	width: 99%;
	height: 146px;
	
	/*background-color: #fff;*/ /*#ccc;*/
	overflow: hidden;
	
	/*background: url('./images/banner.png') no-repeat center;
	background-size: 100% 100%;*/
	
	border: 1px solid #000;
	border-radius: 5px;
}

.NavBar ul {
	list-style: none;
	line-height: 10px;
}

.NavBar li {
	display: inline;
	color: #000000; /*#585858;*/
	font-size: 18px;
	font-family: monospace;
	font-weight: bold;
	padding: 0 10px 0 0;
}

.NavBar a {
	color: #000000; /*#585858;*/
	text-decoration: none;
}

.NavBar a:hover {
	color: #FF0000;
	
	border-bottom: 7px solid #FF0000;
}

.sociais {
	position: absolute;
	
	z-index: 10;
	
	top: 90px;
	left: 10px;
}

.banner {
	position: fixed;
	
	top: 5px;
	left: 30%;
	
	margin-left: -100px; /* A metade de sua largura. */
	
	height: 140px;
	width: 50%; /* O valor que você desejar. */
	
	/*overflow: hidden;*/
	/*position: fixed;*/
	/*top: 110px;*/
	/*left: 42%;*/
	/*width: 57%;*/
	/*height: 300px;*/
	/*margin: 0 auto;*/
	
	background: url('<?php echo $banner_link; ?>');
	/*background: url('./images/banner.png') no-repeat center;*/
	background-size: 100% 100%;
	
	/*border: 1px solid #000;*/
	border-radius: 5px;
}

#produtos {
	overflow: hidden;
	position: fixed;
	top: 152px;
	left: 50%;
	width: 48%;
	height: 480px;
	
	text-align: center;
	font-family: sans-serif;
	font-size: 18px;
	
	background-color: fff;
	background-size: 100% 100%;
	
	transition: background-image 2s;
	
	border-radius: 5px;
	border: 1px solid #000;
}

.footer {
	overflow: hidden;
	position: absolute;
	bottom: 0;
	left: 16.5%;
	width: 81.5%;
	padding: 5px;
	
	text-align: center;
	font-family: sans-serif;
	font-size: 18px;
	
	background-color: #ccc;
	
	border-radius: 5px;
	border: 1px solid #000;
}

.seta_esquerda {
	position: relative;
	width: 64px;
	height: auto;
				
	/*display: inline-block;*/
	
	float: left;
	padding-left: 5px;
}
			
.seta_direita {
    position: relative;
	width: 64px;
	height: 64px;
	
	/*display: inline-block;*/
	
	float: right;
	padding-right: 25px;
}

.titulo-login {
	position: fixed;
	
	z-index: 10;
	overflow: auto;
	
	top: 250px;
	left: 35%;
	width: 280px;
	height: 30px;
	
	background-color: #ccc;
	
	text-shadow: #000 1px -1px, #000 -1px 1px, #000 1px 1px, #000 -1px -1px;
	color: #ffb902;
	font-family: fantasy;
	font-size: 20px;
    
    padding: 5px;
	
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	
	border: 2px solid #ffb902;
}

.login {
	position: fixed;
	z-index: 10;
	top: 290px;
	left: 35%;
	width: 280px;
	height: 130px;
	background-color: #ccc;
	overflow: auto;
	
	text-align: left;
	color: #000;
	font-size: 16px;
	/*font-weight: bold;*/
	
	padding: 5px;
	
	border-bottom-left-radius: 5px;
	border-bottom-right-radius: 5px;
	
	border: 2px solid #ffb902;
}

.text_login {
	float: left;
	
	font-family: monospace;
	font-weight: bold;
	
	width: 80px;
}

.input_login {
	border: 2px solid #ffb902;
	border-radius: 5px;
	
	font-family: monospace;
	font-size: 16px;
	
	height: 26px;
	width: 160px;
}

.button_login {
	border: 2px solid #ffb902;
	border-radius: 5px;
	
	font-size: 16px;
	font-family: monospace;
	color: #ffffff; /*#ffb902;*/
	
	background-color: #8B8989;
	
	height: 26px;
}