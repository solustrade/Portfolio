<?php
/*Configuracaoo do seu e-mail*/
$email_do_seu_site = "comercial@shineraymotos.com";
$senha_do_seu_email = "ShinerayMail@2016";
$nome = $_POST['nome'];
$email = $_POST['email'];
if(isset($_POST['assunto'])){
    $assunto = $_POST['assunto'];
}else{
    $assunto = 'E-mail enviado atraves do site.';
}
$html = '<html>   
          <body>';
            for($i=0;$i<count($arraycampos);$i++){
                $campo = $arraycampos[$i][1];
		if(isset($arraycampos[$i][3]) && isset($arraycampos[$i][3]) == 'file'){
		    continue;
		}
$html .= '<p>'.$arraycampos[$i][0].': '.(isset($_POST[$campo])&& $_POST[$campo]!=$arraycampos[$i][2]?$_POST[$campo]:'').' </p>';
            }
          require_once('setmail.php'); 
          $mail->ClearAddresses(); 
	  //LISTA DE ENDERECOS QUE DEVE SER MANDADO O E-MAIL
          /*Nome da pessoa que enviou a mensagem, por padrao o nome informado no formulario*/
          $mail->FromName = $nome;
          /*Responder para, por padrao o e-mail informado no formulario*/
          $mail->AddReplyTo($email);
	  $mail->AddAddress($email_do_seu_site,'Formulario de E-mail Seu Site');
          $mail->AddAddress($email,$nome);
	  /*Se alterar o nome do campo file, mude o nome da varival anexo*/
	  $nome_anexo = 'anexo';
	  if (isset($_FILES[$nome_anexo]) && $_FILES[$nome_anexo]['error'] == UPLOAD_ERR_OK) {
	    $mail->AddAttachment($_FILES[$nome_anexo]['tmp_name'],
				$_FILES[$nome_anexo]['name']);
	    $html .= '<p>E-mail com anexo.</p>';
	  }
	  $mail->Subject = $assunto;
	  $html .= '<p>Recebemos seu contato e em breve estaremos respondendo.</p></body>
          </html>';
	  $msg = utf8_decode($html);
	  $mail->Body = $msg;     
          //ENVIANDO E RETORNANDO STATUS DO ENVIO
	  if(!$mail->Send()){   
            //ERRO NO ENVIO 
            $aviso = array("Ocorreu um erro no envio do e-mail: '.$email.'. Erro: ".$mail->ErrorInfo,0); //FUNCAO INFORMA O ERRO OCORRIDO //  
	  }else{
	    $aviso = array('E-mail '.$email.' Enviado com sucesso para o Site',1);
	  }