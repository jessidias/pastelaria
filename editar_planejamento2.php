<?php


// Restriзгo para apenas receber 
	// valores pelo formulбrio
	if(isset($_POST["acao"])) {
	
	$id = $_POST["id"];	
	$quant = $_POST['quant'];	
	$data = $_POST['data'];	
	$dia = $_POST['dia'];
		

$con = mysql_connect("localhost", "test", "") or
   die('Nгo foi possнvel conectar');

mysql_select_db("test", $con);
mysql_query("UPDATE planejamento SET quant = '$quant', data = '$data', dia = '$dia' WHERE id = '$id'");

	header("Location: lista_planejamento.php");

} else {

	echo "Acesso negado";

}

?>