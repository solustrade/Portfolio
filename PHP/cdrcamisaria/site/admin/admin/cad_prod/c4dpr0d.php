<?php
	include __DIR__ . '/../../../includes/connection/_inc_db_connect.php';
	
	$imagem_link = 'http://' . $_SERVER['HTTP_HOST'] . '/images/logo.png';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="crud, cadastro de clientes, php, mysql, crud php mysql">
	<meta name="description" content="administre os seus produtos, categorias e banco de dados completo em www.cdrcamisaria.com.br">
	
	<title>Cadastro de categorias - CDR Camisaria</title>
	
	<link rel="stylesheet" type="text/css" href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/cadastros/css/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/cadastros/css/icon.css">
	<link rel="stylesheet" type="text/css" href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/cadastros/css/demo.css">
	
	<style type="text/css">
		body {
            padding-top: 60px;
            padding-bottom: 40px;
            background: url('http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/fundo.jpg');
        }
        .sidebar-nav {
            padding: 9px 0;
        }
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			color:#666;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:120px;
		}
		#logo {
			position: relative;
			float: left;
			width: 158px;
			height: 122px;
			background-image: url('<?php echo $imagem_link; ?>');
			background-repeat: no-repeat;
			background-size: 100% 100%;
}
	</style>
	<script type="text/javascript" src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/functions.js"></script>
	<script type="text/javascript" src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/cadastros/js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/cadastros/js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/jquery.maskMoney.js"></script>
	<script type="text/javascript">
		var url;
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','Novo produto');
			$('#fm').form('clear');
			url = 'SalvarProd';
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Editar produto');
				$('#fm').form('load',row);
				url = 'AtualizarProd?id='+row.id;
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
					onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Erro',
							msg: result.msg
						});
					}
				}
			});
		}
		function removeUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Tem certeza que deseja remover este produto?',function(r){
					if (r){
						$.post('RemoverProd',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
	</script>
	<script type="text/javascript">
        $(document).ready(function(){
              $("input.dinheiro").maskMoney({showSymbol:true, symbol:"R$ ", decimal:".", thousands:""});
        });
    </script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>">Home</a></li>
                        <li><a href="#">Empresa</a></li>
                        <li><a href="#">Promo&ccedil;&otilde;es</a></li>
						<li><a href="#">Contato</a></li>
						<li><a href="Restrito">&Aacute;rea restrita</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
	<div class="row-fluid">
        <div class="span12">
            <div class="well">
                <a href="http://<?php echo($_SERVER["HTTP_HOST"]); ?>" target="_self"><div id="logo"></div></a>
                <br><br><br><br><br><br>
            </div>
        </div>
    </div>
	<div class="row-fluid">
		<div class="well">
			<h3 style="color: #001a66; line-height: 20px;">Produtos:</h3>
			<div class="demo-info" style="margin-bottom:10px; background-color: #001a66;"">
				<div class="demo-tip icon-tip">&nbsp;</div>
				<div style="color: #ffffff;">Clique na opção desejada na barra de ferramentas.</div>
			</div>
			<table id="dg" title="Cadastro de produtos" class="easyui-datagrid" style="width: auto; height: 400px"
				url="PegarProd"
				toolbar="#toolbar" pagination="true"
				rownumbers="true" fitColumns="true" singleSelect="true">
				<thead>
					<tr>
						<th field="descricao"   width="200">Descri&ccedil;&atilde;o</th>
						<th field="obs"  	    width="200">Obs.</th>
						<th field="valor"       width="60">Valor</th>
						<th field="valor_promo" width="60">Promo&ccedil;&atilde;o</th>
						<th field="cor"         width="60">Cor</th>
						<th field="categoria"   width="30">Categoria</th>
					</tr>
				</thead>
			</table>
			<div id="toolbar">
				<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()" title="Adicionar produto">Novo</a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()" title="Alterar produto selecionado">Editar</a>
				<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()" title="Remover produto">Remover</a>
			</div>
		</div>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width: 800px; height: 450px; padding: 10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Cadastro de produtos</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Descri&ccedil;&atilde;o:</label>
				<input name="descricao" style="width: 500px;" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Obs:</label>
				<input name="obs" style="width: 500px;" class="easyui-validatebox" required="true">
			</div>
			<div class="fitem">
				<label>Valor:</label>
				<input name="valor" style="width: 100px;" class="easyui-validatebox dinheiro" required="true" />
			</div>
			<div class="fitem">
				<label>Promo&ccedil;&atilde;o:</label>
				<input name="valor_promo" style="width: 100px;" class="easyui-validatebox dinheiro" required="true" />
			</div>
			<div class="fitem">
				<label>Cor:</label>
				<input name="cor" style="width: 100px;" class="easyui-validatebox" />
			</div>
			<div class="fitem">
				<label>Categoria:</label>
				<select name="categoria" style="width: 300px;" class="easyui-validatebox">
					<?php
                        $query = mysql_query("SELECT id, conteudo, valor FROM categorias order by posicao");
                                                
                        while($categoria = mysql_fetch_array($query)) {
                    ?>
					
					<option value="<?php echo $categoria['valor']; ?>"><?php echo $categoria['conteudo']; ?></option>
					
					<?php
                        }
                    ?>
				</select>
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">Salvar</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancelar</a>
	</div>
	<button class="btn" onclick="VoltaPagina();">Voltar</button>
</body>
</html>