<?php
    /*Altere a cor que o campo ficará caso algum erro na validação, na variável $corerro*/
    $aviso = false; $classaviso = 'none'; $corerro = '#FFBABA';
    /*Defina aqui todos os campos do formulário na ordem Label,
    *name do input ou textarea,
    *valor inicial do campo (dica do que preencher),caso textarea, informe 'textarea',
    *caso textarea crie um array e defina rows e cols, conforme no exemplo abaixo,
    *defina no final se o campo é obrigario ou não com 1 ou 0
    **/
    $arraycampos = array(
                         array('Nome','nome','Informe seu nome','obrigatorio'=>1),
                         array('E-mail','email','Informe seu email','obrigatorio'=>1),
                         array('Telefone','telefone','Informe seu telefone','obrigatorio'=>0),
                         array('Cidade','cidade','Informe sua cidade','obrigatorio'=>0),
                         array('Assunto','assunto','Selecione o Assunto', 'select', 'obrigatorio'=>1, 'option' => array('orcamento' => 'Orçamento', 'duvidas' => 'Dúvidas', 'curriculo' => 'Envio de currículo', 'outros' => 'Outros')),
                         array('Anexo','anexo','Incluir Arquivo Anexo', 'file', 'obrigatorio'=>0),
                         array('Mensagem','mensagem','Escreva sua mensagem','textarea',
                               array('rows'=>'10', 'col'=>'40'),'obrigatorio'=>1
                               )
                         );
    function validacao($arraycampos){
        $return = array();
        if(isset($_POST)){
            for($i=0;$i<count($arraycampos);$i++){
                $campo = $arraycampos[$i][1];
                if(isset($arraycampos[$i]['obrigatorio'])){
                    $obrigatorio = $arraycampos[$i]['obrigatorio'];
                }else{
                    $obrigatorio = false;
                }
                if(isset($_POST[$campo])){
                    if($obrigatorio){
                        if(trim($_POST[$campo])=='' || $_POST[$campo] == $arraycampos[$i][2]){
                            $return[] = $campo;
                        }
                    }
                }
            }
            
        }else{
            return false;
        }
        return $return;
    }
    /*Campos com erro*/
    $campoerror = validacao($arraycampos);
    if(sizeof($campoerror) > 0){
        $aviso = array();
        $aviso[0] = 'Erro:<br>';
        for($i=0;$i<count($campoerror);$i++){
            $aviso[0] .= 'O campo '.$campoerror[$i].' é obrigatorio.<br>';
        }
        $aviso[1] = 0;
    }


?>