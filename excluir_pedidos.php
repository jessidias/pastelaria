<?php


// Restri��o para apenas receber 
	// valores pelo formul�rio
	if(isset($_POST["acao3"])) {
		
		
	$id_pedidos_item = $_POST['id_pedidos_item'];
	$id_pedidos = $_POST['id_pedidos'];
	$id_produto = $_POST['id_produto'];
	$nome_produto = $_POST['nome_produto'];
	$valor_unitario = $_POST['valor_unitario'];
	$quantidade = $_POST['quantidade'];	
	
		

$con = mysql_connect("localhost", "test", "") or
   die('N�o foi poss�vel conectar');

mysql_select_db("test", $con);
mysql_query("DELETE FROM pedidos WHERE id_pedidos='$id_pedidos'");

	header("Location: lista_pedidos.php");

} else {

	echo "Acesso negado";

}

?>