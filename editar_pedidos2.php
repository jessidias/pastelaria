<?php


// Restriзгo para apenas receber 
	// valores pelo formulбrio
	if(isset($_POST["acao"])) {
	
	$id_pedidos_item = $_POST['id_pedidos_item'];
	$quantidade = $_POST['quantidade'];	
	$id_produto = $_POST['id_produto'];


$con = mysql_connect("localhost", "test", "") or
   die('Nгo foi possнvel conectar');

mysql_select_db("test", $con);


foreach ($id_produto as $key => $id_produto){
$insere2 = "UPDATE pedidos_item SET quantidade = '$quantidade[$id_produto]' WHERE id_produto = $id_produto";
$insereB = mysql_query($insere2);

	header("Location: lista_pedidos.php");

}
	}else {

	echo "Acesso negado";

}

	//DELTAR PEDIDO
	if(isset($_POST["acao3"])) {
		
		
	$id_pedidos_item = $_POST['id_pedidos_item'];
	$id_pedidos = $_POST['id_pedidos'];
	$id_produto = $_POST['id_produto'];
	$nome_produto = $_POST['nome_produto'];
	$valor_unitario = $_POST['valor_unitario'];
	$quantidade = $_POST['quantidade'];	
	
		

$con = mysql_connect("localhost", "test", "") or
   die('Nгo foi possнvel conectar');

mysql_select_db("test", $con);
mysql_query("DELETE FROM pedidos WHERE id_pedidos='$id_pedidos'");

	header("Location: lista_pedidos.php");

} else {

	echo "Acesso negado";

}

?>