<?php
    // Define que o arquivo terá a codificação de saída no formato CSS
    header("Content-type: text/css");

    //$imagem_link = 'http://' . $_SERVER['HTTP_HOST'] . '/images/fundo.jpg';
?>

.Fundo {
    background: #86725B; /*e8e8e8;*/
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FFFFFF), to(#86725B));
	background: -webkit-linear-gradient(top, #FFFFFF, #86725B);
	background: -moz-linear-gradient(top, #FFFFFF, #86725B);
	background: -ms-linear-gradient(top, #FFFFFF, #86725B);
	background: -o-linear-gradient(top, #FFFFFF, #86725B);border-bottom:solid 1px #FFFFFF;
}

.MenuTop {
	position: fixed;
	z-index: 15;
	top: 20px;
	left: 70%;
	width: 20%;
	padding: 5px 10px 5px 15px;
	
	color: #FFFFFF;
	font-family: monospace;
	font-size: large;
	
	background-color: #0174DF;
	
	-webkit-border-top-left-radius: 20px;
    -webkit-border-bottom-right-radius: 20px;
    -moz-border-radius-topleft: 20px;
    -moz-border-radius-bottomright: 20px;
    border-top-left-radius: 20px;
    border-bottom-right-radius: 20px;
}