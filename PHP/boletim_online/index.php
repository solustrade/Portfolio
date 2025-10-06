<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Acerto - Lista Clientes</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../../css/acesso-restritook.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0" onKeyDown="enter()">
<form name="form1" method="post" action="gerar_acerto.php">
  <?php //echo number_format($media) ?>
  <table width="75%" border="0">
    <tr>
      <td class="titulonegrito">Vendedor: <?php echo $vendedor =  $rca_codigo." - ".$rca_nome; ?></td>
      <td class="texto-cliente-novo">&nbsp;</td>
    </tr>
    <tr>
      <td class="titulonegrito">Carregamento: <?php echo $carregamento; ?></td>
      <td class="titulonegrito"><label for="codigo_planilha"></label></td>
    </tr>
    <tr>
      <td class="titulonegrito">Usuário Acerto: <?php echo $usuario =  $usu_codigo." - ".$usu_nome; ?></td>
      <td class="titulonegrito">&nbsp;</td>
    </tr>
  </table>
  <table width="1028" height="69" cellpadding="3" cellspacing="3">
  <!-- inicio cabeçalho tabela -->  
    <tr class="texto-branco" bgcolor="#0099FF">
    <td width="26">Linha</td>
    <td width="50">Matricula</td>
    <td width="242">Alunno</td>
    <td width="48">Faltas</td>
    <td width="36">Nota 1</td>
    <td width="52">Nota 2</td>
    <td width="42">Nota 3</td>
    <td width="89">Nota 4</td>
    <td width="66">Faltas</td>
    <td width="59">Total</td>
    <td width="54">Data Ped</td>
    <td width="151">Motivo não Acerto</td>

  </tr>
<!-- fim cabeçalho tabela -->  

<?php
$calculo = 0;
/// query sugestão de compra
$linha = 0;

for($i=0;$i<3;$i++){

$pedido = $i;
$valor = $i;
$nome = 'nome '.$i;


$linha++;
if ($conta%2 == 0) { ?>
 <tr class="titulo10">  
<?php
} else { ?>
 <tr bgcolor="#CCCCCC" class="titulo10"> 
<?php 
 	} 
$conta = $conta + '1';?>
    <td><?php echo $linha ?></td>
	<input type="hidden" name="codigoProduto[]" value="<?php echo $pedido ?>">
    <td title="Código Produto"><label for="matricula[]">
      <input type="text" name="matricula[]" id="matricula[]" />
    </label></td>
    <td title="Descrição"><?php echo $nome ?></td>
    <td title="EMBALAGEM" align="center"><?php echo $volume ?></td>
    <td title="LASTRO"><div  align="right"><?php echo $valor ?>&nbsp;&nbsp;</div></td>
    <td title="Soma de Venda"><?php echo $plano ?></td>
    <td title="ULTIMA ENTRADA"><?php echo $planod ?></td>
    <td><?php echo $praca; ?></td>
    <td align="center"><input class="cor-principal" name="lista_nota[]" type="text" style="text-align: right" id="<?php echo $pedido ?>" size="10" value="<?php echo number_format($valor,2,',',''); ?>" align="left"></td>
	<input type="hidden" name="valorSugestao[]" value="<?php echo $valorsugestao; ?>">
    <td><?php echo $comissao2 = number_format(("0.06" * $valor),2); ?></td>
    <td><?php echo $data; ?></td>
    <td><label for="motivo[]"></label>
      <input type="text" name="motivo[]" id="motivo[]" /></td>
  </tr>
<?PHP
$soma_comissao = $comissao2 + $soma_comissao;
$soma_valor = $soma_valor + $valor;
					}
?>
  <tr bgcolor="#0099FF" class="texto-branco" align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>soma</td>
    <td>&nbsp;</td>
    <td>R$ <?php echo number_format($soma_valor,2,',','.') ?> </td>
    <td>R$ <?php echo number_format($soma_comissao,2,',','.') ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>


  </tr>
</table>
<br>
<input type="submit" name="bt" id="bt" value="Confirma">
</form>
</body>