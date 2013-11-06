<?php
session_start();
include "conexao.inc.php";

$hoje=date("d/m/Y");
$amanha=date('d/m/Y', strtotime("+1 day"));

$sqlP = "SELECT quant FROM planejamento where data = '15/10/2013'";
$resP = mysql_query($sqlP) or die ($sqlP."<br><br>".mysql_error());

while($rowP = mysql_fetch_array($resP)){
$quantP = $rowP['quant'];
}

$sqlT = "SELECT nome_produto, SUM( quantidade ) AS total
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
INNER JOIN clientes on pedidos.id_cliente = clientes.id_cliente
WHERE data_entrega LIKE  '%16/10/2013%'
GROUP BY produtos.id_produto";
$resT = mysql_query($sqlT) or die ($sqlT."<br><br>".mysql_error());

while($rowT = mysql_fetch_array($resT)){
$total = $rowT['total'];
}

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
	<br />
      <br />
      <table width="600" border="0" align="center">
       
        <tr>
        <td align="left"><strong>Pedidos para <?php echo $hoje;?></strong></td>
        <td align="center">&nbsp;</td>
        <td width="428" colspan="2" align="center">
            <table border="0">
<?php
	
	$colunasF = 4;
	
	$sqlFotos = "SELECT nome_cliente, nome_produto, quantidade
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
INNER JOIN clientes on pedidos.id_cliente = clientes.id_cliente
WHERE data_entrega LIKE  '%16/10/2013%'
group by produtos.id_produto";
	$resFotos = mysql_query($sqlFotos) or die ($sqlFotos."<br><br>".mysql_error());
	$qtdFotos = mysql_num_rows($resFotos);

		
		
	$iF = 0;
	while($rowFotos = mysql_fetch_array($resFotos)){
		$leg = $rowFotos['nome_produto'];
		$quantidade = $rowFotos['quantidade'];
		$nome_cliente = $rowFotos['nome_cliente'];
		
		if($iF == 0){ echo '<tr>'; }
		$iF++;
		
		echo '
			<td valign="top" align="center" style="padding:20px;">
				'.$leg.'
			'.$quantidade.'
			'.$nome_cliente.'
			</td>
			
		';
		
		if($iF == $colunasF){
			echo '</tr>';
			$iF = 0;
		}
	}

?>
         
        </table></td>
      </tr>
      <tr>
        <td width="153" align="right" valign="top"> <?php //echo $nome_cliente;?><table width="100%" border="0">
          <tr>
            <td></td>
          </tr>
          </table></td>
        <td width="10" align="right">&nbsp;</td>
        <td colspan="2" align="right" valign="top"><table width="100%" border="0">
          <tr>
            <td align="center"></td>
            
            </tr>
          <tr>
            <td colspan="4"><hr /></td>
          </tr>
         
          
         
          </table></td>
      </tr>
      </table>
      <table width="600" border="0" align="center">
        <tr>
          <td width="269" height="40">Total: <?php echo $total;?></td>
          <td width="315" align="right">Planejamento do dia: <?php echo $quantP;?></td>
        </tr>
    </table></td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
