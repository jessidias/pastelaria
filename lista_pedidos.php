<?php
include "conexao.inc.php";
session_start();

			
$con = mysql_connect("localhost", "test", "") or
   die('Não foi possível conectar');

mysql_select_db("test", $con);


$busca_query = mysql_query("SELECT * FROM pedidos INNER JOIN clientes ON pedidos.id_cliente = clientes.id_cliente WHERE valor_pago = '' ORDER BY pedidos.id_pedidos DESC"); 


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
     Buscar pedidos:
       <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
     <select name="categoria">
       <option value="nome">Nome</option>
       <option value="cpf">CPF</option>
       <option value="cnpj">CNPJ</option>
     </select>
     <input type="submit" name="acao" value="Ok"/>
   </form>
   <h2><a href="pedidos.php"  style="text-decoration:none;color:#FFF">Cadastrar Pedido</a> | <a href="lista_pedidos.php" style="text-decoration:none;color:#FFF">Ver Lista de Pedidos</a></h2>
</div> 
<table width="500"  border="0" align="center">
  <tr >
  <div style="padding-left:250px; padding-right:300px">
   <?php
    while ($dados = mysql_fetch_array($busca_query)) {
   echo "Número do Pedido: <a href='editar_pedidos.php?id_pedidos=$dados[id_pedidos]' style='text-decoration:none;color:#FFF'>$dados[id_pedidos]</a><br />";
	echo "Cliente: $dados[nome_cliente]<br />";
	 echo "Data do Pedido: $dados[data_pedido]<br />";
	  echo "Data da Entrega: $dados[data_entrega]<br />";
	   echo "Valor Total: R$ $dados[valor_total]<br />";
	    echo "Valor Pago: R$ $dados[valor_pago]<br />";
	  
	
	    echo "<hr>";
}
			
?>
</div>
  </tr>
  </table>

</td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
