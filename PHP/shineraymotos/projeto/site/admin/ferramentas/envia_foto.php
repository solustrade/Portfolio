<?php
    //require_once __DIR__ . '/../../include/assets/_inc_header.php';
    //require_once __DIR__ . '/../../include/connection/_inc_db_connect.php';
	
	require_once __DIR__ . '/../../includes/init.inc.php';
	
    $mySQL      = new DB;
    $CampoAtivo = '';
    
    require_once __DIR__ . '/../../includes/assets/_inc_header.php';
    
    //Empresa à qual a logo será associada
    $CorPreDef = $_REQUEST['Color1'];
	$IdProduto = $_REQUEST['id_produto'];
	
    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = __DIR__ . '/../../images/produtos/';

    // Tamanho máximo do arquivo (em Bytes)
    $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

    // Array com as extensões permitidas
    $_UP['extensoes'] = array('jpg', 'png', 'gif');

    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
    $_UP['renomeia'] = false;

    // Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

    // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    if ($_FILES['arquivo']['error'] != 0) {
        die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
        exit; // Pára a execução do script
    }

    // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
    
    // Faz a verificação da extensão do arquivo
    /*$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    
    if (array_search($extensao, $_UP['extensoes']) === false) {
        echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    }
    else*/ if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
        // Faz a verificação do tamanho do arquivo
        echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    }
    else {
        // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
        
        // Primeiro verifica se deve trocar o nome do arquivo

        if ($_UP['renomeia'] == true) {
            // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
            $nome_final = time().'.jpg';
        }
        else {
            // Mantém o nome original do arquivo
            $nome_final = $_FILES['arquivo']['name'];
        }

        // Depois verifica se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
            // insere o nome do arquivo no campo logotipo da tabela empresas
			$sql = $mySQL->executeQuery("insert into fotos (id_produto, foto, cor) values ('$IdProduto', '$nome_final', '$CorPreDef')");
			$sql = $mySQL->executeQuery("update produtos set foto = '$nome_final' where id = '$IdProduto'");
            
            echo '<div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="well">';
                            
            $result = @mysqli_query($sql);
            if ($result){
                #echo json_encode(array('success'=>true)) . '<br />';
                echo '';
            } else {
                echo json_encode(array('msg'=>'Erro ao atualizar dados.')) . '<br />';
            }
            
            // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
            echo "<h5>Upload efetuado com sucesso!</h5>";
            //echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
            
            echo '          </div>
                        </div>
                    </div>
                  </div>';
        }
        else {
            // Não foi possível fazer o upload, provavelmente a pasta está incorreta
            echo '<div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="well">
								<h5>N&atilde;o foi poss&iacute;vel enviar o arquivo, tente novamente!</h5>
							</div>
						</div>
					</div>
				  </div>';
        }
        echo '<div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="well-clear">
                            <form action="http://' . $_SERVER["HTTP_HOST"] . '/CPanel">
								<button class="btn" type="submit">Voltar</button>
							</form>
                        </div>
                    </div>
                </div>
              </div>';
    }
?>