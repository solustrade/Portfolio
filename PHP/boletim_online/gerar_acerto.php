<?php 
//session_name();
//session_start();

?>
	<html>
<head>
<title>Acerto - Conferentecia</title>
<meta name="GENERATOR" content="Microsoft FrontPage 3.0">
<link href="../../../css/acesso-restritook.css" rel="stylesheet" type="text/css">

<?php
$linha = 0;
/// onde recebo os dados do form anterior
$arraySugestao 		= $_POST['lista_nota'];
$arrayProduto 		= $_POST['codigoProduto'];
$arrayMedia 		= $_POST['media'];
$arrayValor 		= $_POST['valorSugestao'];
$array_Matricula	= $_POST['matricula'];
$arrayMotivo		= $_POST['motivo'];

$data = date('d/m/Y H:m:s');
$datanome = date('dmYHms');

//verifico o total
$total = count($arrayProduto);
$salvar = 1;

?>
<form name="form1" method="post" action="grava_final.php">
<input type="hidden" name="fornecedor" value="<?php echo $fornecedor ?>">	
  <table width="962"  border="1">
<!-- inicio cabeçalho tabela -->  
  <tr class="texto-azul" bgcolor="#0099FF">
    <td width="29">Linha</td>
    <td width="38">Pedido.</td>
    <td width="56">Cob.</td>
    <td width="429">Cliente</td>
    <td width="37">nota</td>
    <td width="75">Confirma Nota</td>
    <td width="65">campo</td>
    <td width="123">Motivo</td>
  </tr>
<?php 

for ($i=0; $i<$total; $i++) {
	 	$codprod 		= $arrayProduto[$i];
		$valor_pedido 	= $arraySugestao[$i];
		$previsao 		= $arrayPrevisao[$i];
		$motivo			= $arrayMotivo[$i];
		$matricula		= $array_Matricula[$i];
		$vltotal = 0;
	
//trocando virgula por ponto e ponto por ponto
if(!strpos($valor_pedido,".")&&(strpos($valor_pedido,",")))
$valor_pedido=substr_replace($valor_pedido, '.', strpos($valor_pedido, ","), 1);
//imprimindo resultado
		$comissao = $valor_pedido*'0.06'; 			
		$linha++;
		$total_comissao 	= $total_comissao + $comissao;
		$vlsugestao_total 	= $vltotal+$vlsugestao_total;
		$total_acertado		= $total_acertado + $valor_pedido;
?>	
  <tr>
    <td><?php echo $linha; ?>	</td>
    <td><?php echo $matricula; ?>	</td>
    <input type="hidden" name="codigoProduto[]" value="<?php echo $pedido ?>">
    <td><?php echo $planod; ?>	</td>
    <td align="left"><?php echo $nome; ?></td>
    <td align=""><div align="right"><?php echo $valor_pedido; ?></div></td>
    <td><div align="center"><input class="celula-azul" name="listar_nota[]" type="text" id="<?php echo $pedido ?>" size="6" value="<?php echo $valor_pedido; ?>" align="left"></div></td>
    <td align="right"><?php echo number_format($comissao,2,',',''); ?></td>
    <td align="right"><label for="motivo[]"></label>
      <input name="motivo[]" type="text" id="motivo[]" value="<?php echo $motivo ?>" class="<?php echo $class ?>"></td>
  </tr>
<?php
	}
?>
  <tr bgcolor="#0099FF" class="texto-branco" align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $total_acertado; ?></td>
    <td><?php echo number_format($total_comissao,2,',','.'); ?></td>
    <td>&nbsp;</td>
    
  </tr>
</table>
  <input type="submit" name="button2" id="button2" value="Salvar Acerto">
<p>&nbsp;</p>

<input type="hidden" name="usuario" value="<?php echo $codigo_funcionario; ?>">
<input type="hidden" name="carregamento" value="<?php echo $carregamento; ?>">
<input type="hidden" name="vendedor" value="<?php echo $vendedor; ?>">
<input type="hidden" name="nome_funcionario" value="<?php echo $usu_nome; ?>">

</form>
<font class="texto-azul">
</font>
<?php

if($salvar == 1){

}

?>
<form>
<input type="button" value="Voltar"
onclick="history.go(-1)"> </p>
</form>
