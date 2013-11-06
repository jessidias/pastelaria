<?php
include "conexao.inc.php";
session_start();

	if(isset($_POST["acao3"])) {
		
	$ano = $_POST['ano'];
	
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');
mysql_select_db("test", $con);

 } else {

   echo "Acesso negado";} 
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
        <tr>
          <form method="post" action="rel_periodo.php">
            <td width="247">Visualizar relatório por período:</td>
            <td width="173"><input name="data_1" type="text" id="data_1" size="8" />
              a
              <input name="data_2" type="text" id="data_2" size="8" /></td>
            <td width="166"><input type="submit" name="acao" value="Pesquisar" /></td>
          </form>
        </tr>
        <tr>
          <form method="post" action="rel_mensal.php">
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
            <td><input type="submit" name="acao2" value="Pesquisar" /></td>
          </form>
        </tr>
        <tr>
          <td>Visualizar relatório anual:</td>
          <form method="post" action="rel_anual.php">
            <td><select name="ano">
              <option value="2013">2013</option>
            </select></td>
            <td><input type="submit" name="acao3" value="Pesquisar" /></td>
          </form>
        </tr>
      </table>
      <br />
    </div>
    <div align="left" style="padding-left:250px">
    <?php
$query = "SELECT nome_produto, SUM( quantidade ) AS quant
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE data_entrega LIKE  '%$ano%'
GROUP BY produtos.id_produto
ORDER BY quant DESC";
$result = mysql_query($query) or die(mysql_error());

$queryT = "SELECT SUM( quantidade ) AS total
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE data_entrega LIKE  '%$ano%'";
$resultT = mysql_query($queryT) or die(mysql_error());

$query2 = "SELECT SUM( valor_pago ) AS total
FROM pedidos
WHERE data_entrega LIKE '%/09/%'";
$result2 = mysql_query($query2) or die(mysql_error());

$query3 = "SELECT SUM( valor_pago ) AS total3
FROM pedidos
WHERE data_entrega LIKE '%/10/%'";
$result3 = mysql_query($query3) or die(mysql_error());

$query4 = "SELECT SUM( valor_pago ) AS total4
FROM pedidos
WHERE data_entrega LIKE '%/11/%'";
$result4 = mysql_query($query4) or die(mysql_error());

$query5 = "SELECT SUM( valor_pago ) AS total5
FROM pedidos
WHERE data_entrega LIKE '%/12/%'";
$result5 = mysql_query($query5) or die(mysql_error());

$query6 = "SELECT SUM( valor_pago ) AS total6
FROM pedidos
WHERE data_entrega LIKE '%/08/%'";
$result6 = mysql_query($query6) or die(mysql_error());

$query7 = "SELECT SUM( valor_pago ) AS total7
FROM pedidos
WHERE data_entrega LIKE '%/07/%'";
$result7 = mysql_query($query7) or die(mysql_error());

$query8 = "SELECT SUM( valor_pago ) AS total8
FROM pedidos
WHERE data_entrega LIKE '%/06/%'";
$result8 = mysql_query($query8) or die(mysql_error());

$query9 = "SELECT SUM( valor_pago ) AS total9
FROM pedidos
WHERE data_entrega LIKE '%/05/%'";
$result9 = mysql_query($query9) or die(mysql_error());

$query10 = "SELECT SUM( valor_pago ) AS total10
FROM pedidos
WHERE data_entrega LIKE '%/04/%'";
$result10 = mysql_query($query10) or die(mysql_error());

$query11 = "SELECT SUM( valor_pago ) AS total11
FROM pedidos
WHERE data_entrega LIKE '%/03/%'";
$result11 = mysql_query($query11) or die(mysql_error());

$query12 = "SELECT SUM( valor_pago ) AS total12
FROM pedidos
WHERE data_entrega LIKE '%/02/%'";
$result12 = mysql_query($query12) or die(mysql_error());

$query13 = "SELECT SUM( valor_pago ) AS total13
FROM pedidos
WHERE data_entrega LIKE '%/01/%'";
$result13 = mysql_query($query13) or die(mysql_error());

$sqlT = "SELECT SUM( valor_pago ) AS totala
FROM pedidos
WHERE data_entrega LIKE '%$ano%'";
$sql_resT = mysql_query($sqlT) or die(mysql_error());

	
	echo "<h3>Relatório Anual - $ano</h3>";
	while($row = mysql_fetch_array($result)){
	echo "Quantidade Total de ". $row['nome_produto']. " = ". $row['quant'];
	echo "<br />";
	}
	
	while($rowT = mysql_fetch_array($resultT)){
	echo "Total de Pastéis = ". $rowT['total'];
	}
	
	echo "<br />";
	echo "<h3>Faturamento Anual Bruto - $ano</h3>";
	while($row13 = mysql_fetch_array($result13)){
	echo "Janeiro =   R$ ". number_format($row13['total13'],2). ""; 
	echo "<br />";
	}
	
	while($row12 = mysql_fetch_array($result12)){
	echo "Fevereiro =   R$ ". number_format($row12['total12'],2). ""; 
	echo "<br />";
	}
	
	while($row11 = mysql_fetch_array($result11)){
	echo "Março =   R$ ". number_format($row11['total11'],2). ""; 
	echo "<br />";
	}
	
	while($row10 = mysql_fetch_array($result10)){
	echo "Abril =   R$ ". number_format($row10['total10'],2). ""; 
	echo "<br />";
	}
	
	while($row9 = mysql_fetch_array($result9)){
	echo "Maio =   R$ ". number_format($row9['total9'],2). ""; 
	echo "<br />";
	}
	
	while($row8 = mysql_fetch_array($result8)){
	echo "Junho =   R$ ". number_format($row8['total8'],2). ""; 
	echo "<br />";
	}
	
	while($row7 = mysql_fetch_array($result7)){
	echo "Julho =   R$ ". number_format($row7['total7'],2). ""; 
	echo "<br />";
	}
	
	while($row6 = mysql_fetch_array($result6)){
	echo "Agosto =   R$ ". number_format($row6['total6'],2). ""; 
	echo "<br />";
	}
		
	while($row2 = mysql_fetch_array($result2)){
	echo "Setembro =  R$ ". number_format($row2['total'],2). ""; 
	echo "<br />";
	}
	
	while($row3 = mysql_fetch_array($result3)){
	echo "Outubro =   R$ ". number_format($row3['total3'],2). ""; 
	echo "<br />";
	}

	while($row4 = mysql_fetch_array($result4)){
	echo "Novembro =   R$ ". number_format($row4['total4'],2). ""; 
	echo "<br />";
	}
	while($row5 = mysql_fetch_array($result5)){
	echo "Dezembro =   R$ ". number_format($row5['total5'],2). ""; 
	echo "<br />";
	}
	
	while($rowTo = mysql_fetch_array($sql_resT)){
	echo "Faturamento Anual Bruto Total = R$ ". number_format($rowTo['totala'],2). ""; 
	}
	
	?>
    </div>
	</td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
