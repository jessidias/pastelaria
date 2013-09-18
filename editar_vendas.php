<?php
session_start();
include "conexao.inc.php";

$id_pedidos = $_GET['id_pedidos'];

$sql = "SELECT * FROM  pedidos INNER JOIN clientes ON  pedidos.id_cliente = clientes.id_cliente WHERE pedidos.id_pedidos = '$id_pedidos'";
$sql_res = mysql_query($sql) or die ('ERRO: pesquisar pedido');
$row = mysql_fetch_array($sql_res);

$data_pedido =  $row['data_pedido'];
$data_entrega =  $row['data_entrega'];
$valor_total =  $row['valor_total'];
$valor_pago =  $row['valor_pago'];

$nome_cliente = $row['nome_cliente'];

//DETALHES DO PEDIDO
$sqlP = "SELECT * FROM pedidos_item 
			INNER JOIN produtos 
				ON pedidos_item.id_produto = produtos.id_produto 
			WHERE pedidos_item.id_pedido = '$id_pedidos'";
$sqlP_res = mysql_query($sqlP) or die ('ERRO: pesquisar detalhes do pedido');


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema Web de Controle de Pedidos</title>
<style type="text/css" media="all">
			@import "css/estilos.css";		
			</style>
</head>

<body>
<div id="todos"> 
			
 			   
  				<div id="menuh"><?php include("topo.php"); ?></div>
				
				
				
 				<div id="texto">
              
          <table width="998" border="0">
  <tr>
    <td>
  <div style="padding-left:250px;padding-top:10px">
    <form action="pesquisa_pedidos.php" method="post">
      Buscar pedidos:
      <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
     
    
      <select name="categoria">
			<option value="nome">Nome</option>
			<option value="cpf">CPF</option>
			<option value="cnpj">CNPJ</option>
		</select>
        <input type="submit" name="acao2" value="Ok"/>
      </form></div><br />

<form action="editar_vendas2.php" method="post">
<table width="50%" border='0' align="center" style="padding-left:50px">
			<tr>
			  <td colspan="2" align="center"><h2><a href="vendas.php" style="text-decoration:none;color:#FFF">Fechar Pedidos </a>| <a href="lista_vendas.php"  style="text-decoration:none;color:#FFF">Ver Lista de Vendas</a></h2></td>
		    </tr>
			<tr>
				<td width="224" height="24">Cliente:</td>
    		    <td width="263" height="24"><?php echo $nome_cliente; ?></td>
            </tr>
             <tr>
			  <td height="24">Data do Pedido: </td>
			  <td height="24"><input name="data_pedido" type="text" value="<?php echo $data_pedido; ?>"?></td>
			  </tr> 
               <tr>
			  <td height="24">Data da Entrega: </td>
		  <td height="24"><input name="data_entrega" type="text" value="<?php echo $data_entrega; ?>"?></td>
			  </tr> 
              <tr>
			  <td height="24">Valor Pago: </td>
			  <td height="24">R$ <input name="valor_pago" type="text" value="<?php echo $valor_pago; ?>" size="16" ?></td>
			  </tr> 
            <tr>
			  <td height="24">Valor Total: </td>
			  <td height="24">R$ <input name="valor_total" type="text" value="<?php echo $valor_total; ?>" size="16" ?></td>
			  </tr> 
			<tr>
			  <td height="24">&nbsp;</td>
			  <td height="24"><input type="submit" name="acao" value="Editar Venda" />
          <input name="id_pedidos" type="hidden" value="<?php echo $id_pedidos; ?>" />
               <input type="submit" name="acao3" value="Excluir Venda" />
              </td>
		    </tr>
    
	

	</table>
  </form>
</td>
  </tr>
  
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
