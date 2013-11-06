<?php
include "conexao.inc.php";
session_start();

$hoje=date("d/m/Y");
$semana=date('d/m/Y', strtotime("-8 day"));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema Web de Controle de Pedidos</title>
<style type="text/css" media="all">
			@import "css/estilos.css";		
			</style>
            
		<link href="_style/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="_scripts/jquery.js"></script>
		<script type="text/javascript" src="_scripts/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="_scripts/exemplo-calendario.js"></script>

  <script>
$('#data_1').focus(function(){
    $(this).calendario({
        target:'data_1',
        closeClick:false,
		    });
});


$('#data_2').focus(function(){
    $(this).calendario({
        target:'data_2',
        closeClick:false
		
    });
});

</script>

</head>

<body>
<div id="todos"> 
			
 			   
  				<div id="menuh"><?php include("topo.php"); ?></div>
				
				
				
 				<div id="texto">
              
          <table width="998" border="0">
  <tr>
    <td><div style="padding-left:250px;padding-top:10px">
      <table width="700" border="0">
        
        <tr><form method="post" action="rel_periodo.php">
          <td width="247">Visualizar relatório por período:</td>
          <td width="173"><input name="data_1" type="text" id="data_1" size="8" />
            a 
            <input name="data_2" type="text" id="data_2" size="8" /></td>
          <td width="166"><input type="submit" name="acao" value="Pesquisar" /></td>
           </form></tr>
         
        <tr><form method="post" action="rel_mensal.php">
          <td>Visualizar relatório mensal:</td>
          <td><select name="mensal">
            <option value="/01/">Janeiro</option>
            <option value="/02/">Fevereiro</option>
            <option value="/03/">Março</option>
            <option value="/04/">Abril</option>
            <option value="/05/">Maio</option>
            <option value="/06/">Junho</option>
            <option value="/07/">Julho</option>
            <option value="/08/">Agosto</option>
            <option value="/09/" selected="selected">Setembro</option>
            <option value="/10/">Outubro</option>
            <option value="/11/">Novembro</option>
            <option value="/12/">Dezembro</option>
          </select></td>
          <td><input type="submit" name="acao2" value="Pesquisar" /></td></form>
          </tr>
        <tr>
          <td>Visualizar relatório anual:</td>
          <form method="post" action="rel_anual.php"><td>
          <select name="ano">
            <option value="2013">2013</option>
                    
          </select>
          </td>
          <td><input type="submit" name="acao3" value="Pesquisar" /></td>
          </form>
          </tr>
      </table>
      
   
           <?php 
	 
	$query = "SELECT nome_produto, SUM( quantidade ) AS quant
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE data_entrega BETWEEN '$hoje' and '$semana'
GROUP BY produtos.id_produto
ORDER BY quant DESC";
$result = mysql_query($query) or die(mysql_error());

$queryT = "SELECT SUM( quantidade ) AS total
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE data_entrega BETWEEN '$hoje' and '$semana'";
$resultT = mysql_query($queryT) or die(mysql_error()); 

$sqlT = "SELECT SUM( valor_pago ) AS totala
FROM pedidos
WHERE data_entrega BETWEEN '$hoje' and '$semana'";
$sql_resT = mysql_query($sqlT) or die(mysql_error());


	echo "<h3>Relatório Semanal - $semana a $hoje</h3>";
	while($row = mysql_fetch_array($result)){
	echo "Total ". $row['nome_produto']. " = ". $row['quant'];
	echo "<br />";
	}
	
	while($rowT = mysql_fetch_array($resultT)){
	echo "Total de Pastéis Vendidos = ". $rowT['total'];
	echo "<br />";
	}
	
	while($rowTo = mysql_fetch_array($sql_resT)){
	echo "Faturamento Bruto = R$ ". number_format($rowTo['totala'],2). ""; 
	}

?>
</td>
  </tr>
</table>

           </div>
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
