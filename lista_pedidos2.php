﻿<?php
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
    <form action="pesquisa_clientes.php" method="post">
      Buscar clientes:
      <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
      <select name="categoria">
        <option value="nome">Nome</option>
        <option value="cpf">CPF</option>
        <option value="cnpj">CNPJ</option>
      </select>
      <input type="submit" name="acao" value="Ok"/>
    </form>
  </div>
  <br />
<br />
<form action="editar_pedidos2.php" method="post">
<table border='1' align="center">
			<tr>
			  <td colspan="2" align="center"><h2><a href="clientes.php" style="text-decoration:none;color:#FFF">Cadastrar Pedido </a>| <a href="lista_clientes.php"  style="text-decoration:none;color:#FFF">Ver Lista de Pedidos</a></h2></td>
		    </tr>
			<tr>
				<td width="84">Nome</td>
    		    <td width="335"><?php echo $nome_cliente; ?></td>
            </tr>
          
			<tr>
				<td>Produtos</td>
                <td> 
                
                <table width="330" border="0">
    <?php  while($rowP = mysql_fetch_array($sqlP_res)){
				$id_pedido = $rowP['id_pedido'];
				$id_produto = $rowP['id_produto'];
				$nome_produto = $rowP['nome_produto'];
				$valor_unitario = $rowP['valor_unitario'];
				$quantidade = $rowP['quantidade'];
				$valor_total = $quantidade*$valor_unitario;
				
			    ?>
     
      <tr>
      
        <td width="154"><input type="checkbox" name="id_produto[]" value="<?php echo $id_produto; ?>"/>
          <?php echo $nome_produto; ?></td>
        <td width="166" align="right">Quantidade: 
          <input name="quantidade[<?php echo $id_produto; ?>]" type="text" size="5" value="<?php echo $quantidade; ?>" />
          </td>
        <td width="166" align="right">Unitário: 
          <input name="valor_unitario" type="text" size="5" value="<?php echo $valor_unitario; ?>" /></td>
          <td></td>
          
      </tr>
    <?php } ?>
    </table>
     </td>
            </tr>
			<tr>
			  <td>Valor Total:</td>
			  <td><?php echo number_format($valor_total,2,",","."); ?></td>
			  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input type="submit" name="acao" value="Editar Pedido" />
               <input name="id_pedido" type="hidden" value="<?php echo $id_pedido; ?>" /></td>
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