<?php

	if(isset($_POST["acao"])) {
	
	$id_pedidos = $_POST['id_pedidos'];		
	$valor_total = $_POST['valor_total'];	
	
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');

mysql_select_db("test", $con);

	
mysql_query("UPDATE pedidos SET valor_pago = '$valor_total' WHERE id_pedidos = '$id_pedidos'");

	header("Location: vendas.php?msg=0");


} else {

	echo "Acesso negado";

}
	
?>