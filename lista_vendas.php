﻿<?php
include "conexao.inc.php";
session_start();

$query2 = mysql_query("SELECT a.nome_cliente, b.id_cliente, b.data_pedido, b.valor_total, b.valor_pago, b.id_pedidos FROM clientes AS a INNER JOIN pedidos AS b ON b.id_cliente=a.id_cliente and b.valor_pago!='' ORDER BY id_pedidos DESC;");


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
    <td><div style="padding-left:250px;padding-top:10px"><form action="pesquisa_vendas.php" method="post">
      Buscar vendas:
            <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
      <select name="categoria">
        <option value="nome">Nome</option>
        <option value="cpf">CPF</option>
        <option value="cnpj">CNPJ</option>
      </select>
      <input type="submit" name="acao2" value="Ok"/>
    </form>
      
</div>
      <br />
      <table width="600" border='0' align="center">
        <tr>
          <td colspan="7" align="center"><h2><a href="vendas.php" style="text-decoration:none;color:#FFF">Fechar Pedidos </a>| <a href="lista_vendas.php"  style="text-decoration:none;color:#FFF">Ver Lista de Vendas</a></h2></td>
        </tr>
        <tr>
          <td align="left">Nº Venda</td>
          <td align="left">Cliente</td>
          <td align="left">Data do pedido</td>
          <td align="left">Valor Total </td>
          <td align="left">Valor Pago</td>
          <td align="center">&nbsp;</td>
          
        </tr>
        <?php while($dados = mysql_fetch_array($query2)) {?>
         
        <tr>
          <td><a href="editar_vendas.php?id_pedidos=<?php echo $dados['id_pedidos']; ?>" style="text-decoration:none;color:#FFF"><?php echo $dados['id_pedidos']; ?></a></td>
          <td><?php echo $dados['nome_cliente']; ?></td>
          <td><?php echo $dados['data_pedido']; ?></td>
          <td>R$  <?php echo $dados['valor_total']; ?></td>
		  <td>R$  <?php echo $dados['valor_pago']; ?></td>
          <td align="center"></td>
         
          </tr>
        <?php } ?>
       
      </table>
      <br />


<br /></td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>