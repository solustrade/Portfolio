<?php
/*Inclue a Classe phpmailer e a instancia*/
require_once("phpmailer/class.phpmailer.php"); 
$mail = new PHPMailer();
/*Envia utilizando SMTP (maioria dos provedores)*/
$mail->IsSMTP();
/*Endereço do Host SMTP, configurado o do gmail*/
$mail->Host = "cpanel0097.hospedagemdesites.ws";
/*Número da porta do servidor de e-mail, configurado a do gmail*/
$mail->Port = 465;
/*Define a Autenticação como necessária, configurado pelo gmail*/
$mail->SMTPAuth = true;
/*Define o tipo de segurança usada, configurado pelo gmail*/
$mail->SMTPSecure = "ssl";
/*Define o nome do seu usuário de e-mail, configurado pelo gmail*/
$mail->Username = $email_do_seu_site;
/*Define a senha para acessar o e-mail*/
$mail->Password = $senha_do_seu_email;
/*Adiciona o From e-mail, de onde o e-mail foi enviado,
*por padrão utilize o seu e-mail, o mesmo em $mail->Username
**/
$mail->From = $email_do_seu_site; 
/*DEFININDO A LINGUAGEM*/
$mail->SetLanguage("br", "phpmailer/language/");
/*Define a quebra de linha após 50 caracteres*/
$mail->WordWrap = 50;
/*Define que a mensagem é do tipo HTML*/
$mail->IsHTML(true);
?>