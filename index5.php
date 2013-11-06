<?php
session_start();
include "conexao.inc.php";

$sql = "SELECT * 
FROM pedidos
INNER JOIN clientes ON pedidos.id_cliente = clientes.id_cliente
INNER JOIN pedidos_item ON pedidos.id_pedidos = pedidos_item.id_pedido
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE pedidos.data_entrega =  '16/10/2013'
ORDER BY clientes.id_cliente asc";
$sql_res = mysql_query($sql) or die ('ERRO: pesquisar pedido');



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


<table width="50%" border='0' align="center">
			 <?php  while($row = mysql_fetch_array($sql_res)){ 
				$nome_cliente = $row['nome_cliente'];
				$id_pedidos_item = $row['id_pedidos_item'];
				$id_pedido = $row['id_pedido'];
				$id_produto = $row['id_produto'];
				$nome_produto = $row['nome_produto'];
				$valor_unitario = $row['valor_unitario'];
			    $quantidade = $row['quantidade'];
			 ?>
            <tr>
				<td width="84">Cliente:</td>
    		    <td width="335"><?php echo $nome_cliente; ?></td>
            </tr>
            
          
			<tr>
				<td>Produtos:</td>
                <td> 
                
                <table width="100%" border="0">
   
     
      <tr>
      
        <td width="182"><input type="checkbox" name="id_produto[]" value="<?php echo $id_produto; ?>"/><?php echo $nome_produto; ?></td>
        <td width="171" align="right">Quantidade: 
          <input name="quantidade[<?php echo $id_produto; ?>]" type="text" size="5" value="<?php echo $quantidade; ?>" />
        </td>
        <td width="10"></td>
          
      </tr>
  
    </table> <?php } ?>
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
