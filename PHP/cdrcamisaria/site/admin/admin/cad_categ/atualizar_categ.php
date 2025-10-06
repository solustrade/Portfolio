<?php
	$id        = intval($_REQUEST['id']);
	$Content   = htmlentities($_REQUEST['conteudo']);
	$Position  = $_REQUEST['posicao'];
	$Value     = $_REQUEST['posicao'];
	$Obser     = htmlentities($_REQUEST['obs']);

	include __DIR__ . '/../../../includes/connection/_inc_db_connect.php';
	
	$sql = "update categorias set
			conteudo='$Content',
			posicao='$Position',
			valor='$Position',
			obs='$Obser' where id=$id";

	$result = @mysql_query($sql);

	if ($result){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>'Erro ao atualizar dados.'));
	}
?>