<?php


// Restriзгo para apenas receber 
	// valores pelo formulбrio
	if(isset($_POST["acao"])) {
	$id_pedidos = $_POST['id_pedidos'];
	$data_pedido = $_POST['data_pedido'];
	$data_entrega = $_POST['data_entrega'];
	$valor_total = $_POST['valor_total'];
	$valor_pago = $_POST['valor_pago'];
	

$con = mysql_connect("localhost", "test", "") or
   die('Nгo foi possнvel conectar');

mysql_select_db("test", $con);



$insere2 = "UPDATE pedidos SET data_pedido = '$data_pedido', data_entrega = '$data_entrega', valor_pago = '$valor_pago', valor_total = '$valor_total' WHERE id_pedidos = $id_pedidos";
$insereB = mysql_query($insere2);

	header("Location: lista_vendas.php");

}
	else {

	echo "Acesso negado";

}

	// Restriзгo para apenas receber 
	// valores pelo formulбrio
	if(isset($_POST["acao3"])) {

	$id_pedidos = $_POST['id_pedidos'];
	
$con = mysql_connect("localhost", "test", "") or
   die('Nгo foi possнvel conectar');

mysql_select_db("test", $con);
mysql_query("DELETE FROM pedidos WHERE id_pedidos='$id_pedidos'");

	header("Location: lista_vendas.php");

} else {

	echo "Acesso negado";

}

?>