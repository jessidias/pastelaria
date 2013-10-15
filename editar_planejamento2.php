<?php


// Restriзгo para apenas receber 
	// valores pelo formulбrio
	if(isset($_POST["acao"])) {
	
	$id = $_POST["id"];	
	$quant = $_POST['quant'];	
	$dia = $_POST['dia'];	
	$data = $_POST['data'];	
		

$con = mysql_connect("localhost", "test", "") or
   die('Nгo foi possнvel conectar');

mysql_select_db("test", $con);
mysql_query("UPDATE planejamento SET quant = '$quant', dia = '$dia', data = '$data' WHERE id = '$id'");

	header("Location: lista_planejamento.php");

} else {

	echo "Acesso negado";

}

?>