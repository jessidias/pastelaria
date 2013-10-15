<?php
session_start();
include "conexao.inc.php";

$hoje=date("d/m/Y");
$amanha=date('d/m/Y', strtotime("+1 day"));

$query = "SELECT * FROM planejamento WHERE data = '$hoje' ORDER BY id DESC LIMIT 1";
$res = mysql_query($query) or die ('ERRO: pesquisar planejamento');

$sql_pega_data = mysql_query("SELECT * FROM planejamento ORDER BY id DESC LIMIT 1");
$linha = mysql_fetch_assoc($sql_pega_data);
$data = $linha['data'];

$sqlS = "SELECT nome_produto, SUM( quantidade ) AS quant
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE data_entrega LIKE  '%$amanha%'
GROUP BY produtos.id_produto
ORDER BY quant DESC";
$sqlS_res = mysql_query($sqlS) or die ('ERRO: pesquisar produto');

$sqlT = "SELECT nome_produto, SUM( quantidade ) AS total
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE data_entrega LIKE  '%$amanha%'";
$sqlT_res = mysql_query($sqlT) or die ('ERRO: pesquisar produto');


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
    <div style="padding-left:180px;padding-top:10px"><h2><a href="planejamento.php" style="text-decoration:none;color:#FFF">Cadastrar Planejamento</a> | <a href="lista_planejamento.php" style="text-decoration:none;color:#FFF">Lista de Planejamento</a></h2>

    <?php if ($hoje == $data) { 
	 echo '<table width="400" border=0>';
        echo '<tr>';
          echo '<td align=right>Quantidade de pastéis do dia:</td>';
          echo '<td align="right">&nbsp;</td>';
          echo '<td><input name="quant" type="text" disabled="disabled"/></td>';
        echo '</tr>';
       echo '<tr>';
          echo '<td align="right">Data:</td>';
          echo '<td align="right">&nbsp;</td>';
        echo  '<td><input name="data" type="text" disabled="disabled"/></td>';
        echo '</tr>';
        echo '<tr>';
         echo '<td align="right">Dia da semana:</td>';
         echo  '<td align="right">&nbsp;</td>';
         echo  '<td><input name="dia" type="text" disabled="disabled"/></td>';
       echo '</tr>';
        echo '<tr>';
         echo  '<td>&nbsp;</td>';
         echo  '<td>&nbsp;</td>';
         echo  '<td><input type="submit" name="acao2" value="Registrar" disabled="disabled"/>
		  </td>';
       echo  '</tr>';
     echo  '</table>';
	} else { 
    echo '<form action="cadastra_planejamento.php" method="post">';
    echo '<table width="400" border=0>';
        echo '<tr>';
          echo '<td align=right>Quantidade de pastéis do dia:</td>';
          echo '<td align="right">&nbsp;</td>';
          echo '<td><input name="quant" type="text"/></td>';
        echo '</tr>';
       echo '<tr>';
          echo '<td align="right">Data:</td>';
          echo '<td align="right">&nbsp;</td>';
        echo  '<td><input name="data" type="text" /></td>';
        echo '</tr>';
        echo '<tr>';
         echo '<td align="right">Dia da semana:</td>';
         echo  '<td align="right">&nbsp;</td>';
         echo  '<td><input name="dia" type="text"/></td>';
       echo '</tr>';
        echo '<tr>';
         echo  '<td>&nbsp;</td>';
         echo  '<td>&nbsp;</td>';
         echo  '<td><input type="submit" name="acao2" value="Registrar"/></td>';
       echo  '</tr>';
     echo  '</table>';
  echo  '</form>';
	} ?>
    </div>
      <br />
    <div style="padding-left:270px">      <?php while($row = mysql_fetch_array($res)) {?>
O Planejamento para o dia <?php echo $row['data']; ?>, <?php echo $row['dia']; ?>, é de <?php echo $row['quant']; ?> pastéis. </div>

      <table width="500" border='0' align="center">
        <tr>
          <td colspan="3" align="center"><h2>Relatório Diário</h2>
O Relatório Diário fornece a soma dos produtos que devem ser entregues no dia <?php echo $amanha; ?>.</td>
        </tr>
     
        <tr>
          <td width="170" height="40" align="left"><?php echo $row['data']; ?> - <?php echo $row['dia']; ?></td>
          <td width="158" align="center">Quantidade</td>
          </tr>
     <?php } ?>
      <?php  while($rowS = mysql_fetch_array($sqlS_res)){
				$nome_produto = $rowS['nome_produto'];
			     ?>
        <tr>
          <td width="182"><?php echo $rowS['nome_produto']; ?></td>
        <td width="171" align="center" ><?php echo $rowS['quant']; ?></td>
        
          </tr> <?php } ?>

	 <?php  while($rowT = mysql_fetch_array($sqlT_res)){
				
			     ?>
        <tr>
          <td>&nbsp;</td>
          <td align="center" >Total: <?php echo $rowT['total']; ?></td>
        </tr>
    <?php /*?>  <?php $subtotal = $quant - $total;?><?php */?>
        <tr>
          <td>&nbsp;</td>
          <td align="center" >Pastéis para serem feitos:<?php /*?><?php echo $subtotal; ?><?php */?></td>
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
