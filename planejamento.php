<?php
include "conexao.inc.php";
session_start();

$query2 = mysql_query("SELECT a.nome_cliente, b.id_cliente, b.data_pedido, b.valor_total, b.valor_pago, b.id_pedidos FROM clientes AS a INNER JOIN pedidos AS b ON b.id_cliente=a.id_cliente and b.valor_pago='';");


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
    <div style="padding-left:290px;padding-top:10px"> 
    <form action="pesquisa_vendas.php" method="post">
      <table width="400" border="1">
        <tr>
          <td align="right">Quantidade de pastéis do dia:</td>
          <td><input name="palavra" type="text" value="300" /></td>
        </tr>
        <tr>
          <td align="right">Data:</td>
          <td><input name="palavra3" type="text" value="06/09/2013" /></td>
        </tr>
        <tr>
          <td align="right">Dia da Semana:</td>
          <td><input name="palavra2" type="text" value="Quinta-Feira" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="acao2" value="Registrar"/></td>
        </tr>
      </table>
      <br />
      <br />
    </form>
    </div>
      <br />
      <table width="600" border='1' align="center">
        <tr>
          <td colspan="3" align="center"><h2><a href="vendas.php" style="text-decoration:none;color:#FFF">Relatório Diário</a><a href="lista_vendas.php"  style="text-decoration:none;color:#FFF"></a></h2></td>
        </tr>
        <tr>
          <td width="170" align="center">Dia 06/09/2013 - Quinta-Feira</td>
          <td width="158" align="center">Quantidade</td>
          </tr>
     
         
        <tr align="center">
          <td align="center">Pastel de Carne</td>
          <td align="center">100</td>
        
          </tr>
        <tr align="center">
          <td align="center">Pastel de Frango</td>
          <td align="center">100</td>
          </tr>
        <tr align="center">
          <td align="center">Pastel de Queijo</td>
          <td align="center">50</td>
          </tr>
        <tr align="center">
          <td align="center">Pastel de Palmito</td>
          <td align="center">50</td>
          </tr>
        <tr align="center">
          <td align="center">Total:</td>
          <td align="center">300</td>
          </tr>
     
       
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
