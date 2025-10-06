<?php
    require_once __DIR__ . '/../../../includes/assets/_inc_header.php';
    require_once __DIR__ . '/../../../includes/connection/_inc_db_connect.php';
    
    //Produto ao qual a foto ser� associada
    $IdProduto = $_REQUEST['id_produto'];
	
	echo '<h1>&nbsp;&nbsp;Produto atualizado: ' . $IdProduto . '</h1><br>';
    
    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = __DIR__ . '/../../../images/products/';

    // Tamanho m�ximo do arquivo (em Bytes)
    $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

    // Array com as extens�es permitidas
    $_UP['extensoes'] = array('jpg', 'png', 'gif');

    // Renomeia o arquivo? (Se true, o arquivo ser� salvo como .jpg e um nome �nico)
    $_UP['renomeia'] = false;

    // Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'N�o houve erro';
    $_UP['erros'][1] = 'O arquivo no upload � maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'N�o foi feito o upload do arquivo';

    // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    if ($_FILES['arquivo']['error'] != 0) {
        die("N�o foi poss�vel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
        exit; // P�ra a execu��o do script
    }

    // Caso script chegue a esse ponto, n�o houve erro com o upload e o PHP pode continuar
    
    // Faz a verifica��o da extens�o do arquivo
    /*$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    
    if (array_search($extensao, $_UP['extensoes']) === false) {
        echo "Por favor, envie arquivos com as seguintes extens�es: jpg, png ou gif";
    }
    else*/ if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
        // Faz a verifica��o do tamanho do arquivo
        echo "O arquivo enviado � muito grande, envie arquivos de at� 2Mb.";
    }
    else {
        // O arquivo passou em todas as verifica��es, hora de tentar mov�-lo para a pasta
        
        // Primeiro verifica se deve trocar o nome do arquivo

        if ($_UP['renomeia'] == true) {
            // Cria um nome baseado no UNIX TIMESTAMP atual e com extens�o .jpg
            $nome_final = time().'.jpg';
        }
        else {
            // Mant�m o nome original do arquivo
            $nome_final = $_FILES['arquivo']['name'];
        }

        // Depois verifica se � poss�vel mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
            // insere o nome do arquivo no campo logotipo da tabela empresas
            $sql = "update produtos set imagem = '$nome_final' where id = '$IdProduto'";
            
            echo '<div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="well">';
                            
            $result = @mysql_query($sql);
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
            // N�o foi poss�vel fazer o upload, provavelmente a pasta est� incorreta
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
                            <button class="btn" type="submit" onclick="VoltaPagina();">Voltar</button>
                        </div>
                    </div>
                </div>
              </div>';
    }
?>