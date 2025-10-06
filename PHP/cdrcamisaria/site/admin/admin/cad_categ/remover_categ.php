<?php
	$id = intval($_REQUEST['id']);
	
	include __DIR__ . '/../../../includes/connection/_inc_db_connect.php';

	$sql = "delete from categorias where id=$id";

	$result = @mysql_query($sql);

	if ($result){
		echo json_encode(array('success'=>true));
	} else {
		echo json_encode(array('msg'=>'Erro ao remover dados.'));
	}
?>