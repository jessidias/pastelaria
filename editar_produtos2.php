<?php


// Restri��o para apenas receber 
	// valores pelo formul�rio
	if(isset($_POST["acao"])) {
	
	$id_produto = $_POST["id_produto"];	
	$nome_produto = $_POST['nome_produto'];	
	$valor_unitario = $_POST['valor_unitario'];	
		
		

$con = mysql_connect("localhost", "test", "") or
   die('N�o foi poss�vel conectar');

mysql_select_db("test", $con);
mysql_query("UPDATE produtos SET nome_produto = '$nome_produto', valor_unitario = '$valor_unitario' WHERE id_produto = '$id_produto'");

	header("Location: lista_produtos.php");

} else {

	echo "Acesso negado";

}

?>