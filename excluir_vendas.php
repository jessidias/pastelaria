<?php
	// Restriзгo para apenas receber 
	// valores pelo formulбrio
	if(isset($_POST["acao"])) {

	$id_pedidos = $_POST['id_pedidos'];
	
$con = mysql_connect("localhost", "test", "") or
   die('Nгo foi possнvel conectar');

mysql_select_db("test", $con);
mysql_query("DELETE FROM pedidos WHERE id_pedidos='$id_pedidos'");

	header("Location: lista_vendas.php?msg=1");

} else {

	echo "Acesso negado";

}

?>