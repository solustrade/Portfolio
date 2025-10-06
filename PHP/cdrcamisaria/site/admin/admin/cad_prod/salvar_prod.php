<?php
	$Descric    = htmlentities($_REQUEST['descricao']);
	$Obser      = $_REQUEST['obs'];
	$Value      = $_REQUEST['valor'];
	$PromoValue = $_REQUEST['valor_promo'];
	$Color      = $_REQUEST['cor'];
	$Categ      = $_REQUEST['categoria'];

	include __DIR__ . '/../../../includes/connection/_inc_db_connect.php';
	
	$sql = "insert into produtos(descricao, obs, valor, valor_promo, cor, categoria)
	       values('$Descric', '$Obser', '$Value', '$PromoValue', '$Color', '$Categ')";

	$result = @mysql_query($sql);

	if ($result){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>'Erro ao inserir dados.'));
	}
?>