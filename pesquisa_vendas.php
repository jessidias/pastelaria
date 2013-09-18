<?php
include "conexao.inc.php";
session_start();



// Restrição para apenas receber 
	// valores pelo formulário
	if(isset($_POST["acao2"])) {

$busca = $_POST['palavra'];// palavra que o usuario digitou
$categoria = $_POST['categoria']; //categoria que o usuario deseja
			

$con = mysql_connect("localhost", "test", "") or
   die('Não foi possível conectar');

mysql_select_db("test", $con);


if ($categoria == 'nome'){
$busca_query = mysql_query("SELECT * FROM pedidos INNER JOIN clientes ON pedidos.id_cliente = clientes.id_cliente WHERE clientes.nome_cliente LIKE '%$busca%' and valor_pago != '' ORDER BY pedidos.id_pedidos DESC"); 
}
if ($categoria == 'cpf') {
$busca_query = mysql_query("SELECT * FROM pedidos INNER JOIN clientes ON pedidos.id_cliente = clientes.id_cliente WHERE clientes.cpf LIKE '%$busca%' and valor_pago != '' ORDER BY pedidos.id_pedidos DESC");
	}
if ($categoria == 'cnpj') {
$busca_query = mysql_query("SELECT * FROM pedidos INNER JOIN clientes ON pedidos.id_cliente = clientes.id_cliente WHERE clientes.cnpj LIKE '%$busca%' and valor_pago != '' ORDER BY pedidos.id_pedidos DESC");
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
    <div style="padding-left:250px;padding-top:10px">
   <h2> Resultados da pesquisa por "<?php echo $busca; ?>"</h2>
</div> <br />
<br />

<table width="500"  border="0" align="center">
  <tr >
  <div style="padding-left:250px; padding-right:300px">
   <?php
    while ($dados = mysql_fetch_array($busca_query)) {
   echo "Número do Pedido: $dados[id_pedidos]<br />";
	echo "Cliente: $dados[nome_cliente]<br />";
	 echo "Data do Pedido: $dados[data_pedido]<br />";
	  echo "Data da Entrega: $dados[data_entrega]<br />";
	   echo "Valor Total: R$ $dados[valor_total]<br />";
	    echo "Valor Pago: R$ $dados[valor_pago]<br />";
	  
	
	    echo "<hr>";
}
			
} else {

	echo "Acesso negado";

}?>
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
