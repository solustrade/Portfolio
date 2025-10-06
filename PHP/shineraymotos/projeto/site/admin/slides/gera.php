<?php
    require_once '../../includes/init.inc.php';
	
    $mySQL      = new DB;
  
    //RECEBE PARÂMETRO  
    $id = $_GET["id_msg"];  

    //CONECTA AO MYSQL                                               
    $query = $mySQL->executeQuery("SELECT image" . $id . " FROM banner order by id desc limit 1");

    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $bytes  = $row["image" . $id];                        
    //EXIBE IMAGEM                                 
    header( "Content-type: image/gif");              
    echo $bytes;
?>