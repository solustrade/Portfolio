<?php
    set_time_limit(7200);

    define('_DB_HOST', "localhost");
    define('_DB_USER', "cdrcamis_admin");
    define('_DB_PASS', "AdminLoja@2017");
    define('_DB_DATA', "cdrcamis_loja");

    $db = mysql_connect(_DB_HOST, _DB_USER, _DB_PASS) or die(mysql_error());
    mysql_select_db(_DB_DATA, $db) or die(mysql_error());
?>