<html>
	<?php
        $Subtitle = 'Manuten&ccedil;&atilde;o';
        
        require_once '../include/assets/_inc_header.php';
    ?>

    <body class="fundo">
        <div class="ManutDados">
            <?php
                $TipoManut = $_GET['Type'];
                $CodigoReg = $_GET['Code'];
                
                echo 'Tipo: ' . $TipoManut . '<br>';
                echo 'Codigo: ' . $CodigoReg;
            ?>
        </div>
    </body>
</html>