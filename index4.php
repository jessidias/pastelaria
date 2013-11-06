<?php
error_reporting(E_ERROR | E_PARSE);
include "conexao.inc.php";
session_start();

$query2 = mysql_query("SELECT quantidade, nome_cliente
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
INNER JOIN clientes ON pedidos.id_cliente = clientes.id_cliente
WHERE data_entrega LIKE  '%16/10/2013%'
GROUP BY clientes.id_cliente
ORDER BY clientes.id_cliente ASC");

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
    <form action="pesquisa_vendas.php" method="post">
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
          <td height="30" colspan="2" align="center"></td>
        </tr>
        <tr>
          <td align="left">Cliente</td>
          <td align="left"><?php
	
	$colunasF = 4;
	
	$sqlFotos = "SELECT nome_produto FROM produtos";
	$resFotos = mysql_query($sqlFotos) or die ($sqlFotos."<br><br>".mysql_error());
	$qtdFotos = mysql_num_rows($resFotos);

		
		
	$iF = 0;
	while($rowFotos = mysql_fetch_array($resFotos)){
		$leg = $rowFotos['nome_produto'];
		
		
		if($iF == 0){ echo '<tr>'; }
		$iF++;
		
		echo '
			<td valign="top" align="center">
				'.$leg.'
						</td>
			
		';
		
		if($iF == $colunasF){
			echo '</tr>';
			$iF = 0;
		}
	}

?></td>
          </tr>
        <?php while($dados = mysql_fetch_array($query2)) {?>
         
        
        <tr>
          <td><?php echo $dados['nome_cliente']; ?></td>
          <td><?php
	
	$sqlQ = "SELECT quantidade
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
INNER JOIN clientes ON pedidos.id_cliente = clientes.id_cliente
WHERE data_entrega LIKE  '%16/10/2013%'";
	$resQ = mysql_query($sqlQ) or die ($sqlQ."<br><br>".mysql_error());
	$qtdQ = mysql_num_rows($resQ);

		
		
	$iFQ = 0;
	while($rowQ = mysql_fetch_array($resQ)){
		$quantidade = $rowQ['quantidade'];
		$id_produto = $rowQ['id_produto'];
		
		
		if($iFQ == 0 ){ echo '<tr>'; }
		$iFQ++;
		
		echo '
			<td valign="top" align="center">
				'.$quantidade.'
						</td>
			
		';
		
		if($iFQ == $colunasFQ){
			echo '</tr>';
			$iFQ = 0;
		}
	}

?></td>
         
          </tr>
            <?php } ?>
       
      </table>
      </td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
