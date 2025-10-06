<?php
	$id         = intval($_REQUEST['id']);
	$Descric    = htmlentities($_REQUEST['descricao']);
	$Obser      = $_REQUEST['obs'];
	$Value      = $_REQUEST['valor'];
	$PromoValue = $_REQUEST['valor_promo'];
	$Color      = $_REQUEST['cor'];
	$Categ      = $_REQUEST['categoria'];

	include __DIR__ . '/../../../includes/connection/_inc_db_connect.php';
	
	$sql = "update produtos set
			descricao='$Descric',
			obs='$Obser',
			valor='$Value',
			valor_promo='$PromoValue',
			cor='$Color',
			categoria='$Categ' where id=$id";

	$result = @mysql_query($sql);

	if ($result){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>'Erro ao atualizar dados.'));
	}
?>