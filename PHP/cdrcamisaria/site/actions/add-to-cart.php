<?php
    require_once __DIR__ . '/../includes/connection/_inc_db_connect.php';
    require_once __DIR__ . '/../includes/init.inc.php';
    
    $prdId = isset($_GET["product"]) && is_numeric($_GET["product"]) ? $_GET["product"] : 0;
    $qty = isset($_GET["qty"]) && is_numeric($_GET["qty"]) ? $_GET["qty"] : 1;
    
    Cart::setItem($prdId, $qty);

    header("location: CalculaFrete?cep_destination=".$_SESSION['cep_destination']);
?>