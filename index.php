<?php
session_start();
include "conexao.inc.php";

$hoje=date("d/m/Y");
$amanha=date('d/m/Y', strtotime("+1 day"));

$query ="SELECT nome_produto, SUM( quantidade ) AS quant
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
INNER JOIN clientes on pedidos.id_cliente = clientes.id_cliente
WHERE data_entrega LIKE  '%$amanha%'
GROUP BY produtos.id_produto";
$res = mysql_query($query) or die ('ERRO: pesquisar planejamento');


$prod ="SELECT * from produtos"; 
$res_prod = mysql_query($prod) or die ('ERRO: pesquisar produtos');

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
       <?php while($row = mysql_fetch_array($res)) { ?>
        <tr>
        <td align="left"><strong>Pedidos para <?php echo $hoje;?></strong></td>
        <td align="center">&nbsp;</td>
        <td width="428" colspan="2" align="center"><table width="100%" border="0">
          <?php while($row2 = mysql_fetch_array($res_prod)) { ?>
          <tr>
            <td width="25%" align="center"><?php echo $row2['nome_produto'];?></td>          
          </tr>
          <?php } ?>
        </table></td>
      </tr>
      <tr>
        <td width="153" align="right" valign="top"><table width="100%" border="0">
          <tr>
            <td></td>
          </tr>
          </table></td>
        <td width="10" align="right">&nbsp;</td>
        <td colspan="2" align="right" valign="top"><table width="100%" border="0">
          <tr>
            <td align="center"><?php echo $row['quant']; ?></td>
            
            </tr>
          <tr>
            <td colspan="4"><hr /></td>
          </tr>
         
          
          <?php } ?>
          </table></td>
      </tr>
      </table>
      <table width="600" border="0" align="center">
        <tr>
          <td width="269" height="40">Total: 225</td>
          <td width="315" align="right">Quantidade de pastéis do dia: 300</td>
        </tr>
    </table></td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
