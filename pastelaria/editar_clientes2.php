<?php


// Restriзгo para apenas receber 
	// valores pelo formulбrio
	if(isset($_POST["acao"])) {
	
	$id_cliente = $_POST["id_cliente"];	
	$nome_cliente = $_POST['nome_cliente'];	
	$cpf = $_POST['cpf'];	
	$cnpj = $_POST['cnpj'];	
	$email = $_POST['email'];	
	$telefone1 = $_POST['telefone1'];	
	$telefone2 = $_POST['telefone2'];
	$telefone3 = $_POST['telefone3'];	
		

$con = mysql_connect("localhost", "root", "12345") or
   die('Nгo foi possнvel conectar');

mysql_select_db("test", $con);
mysql_query("UPDATE clientes SET nome_cliente = '$nome_cliente', cpf = '$cpf', cnpj = '$cnpj', email = '$email', telefone1 = '$telefone1', telefone2 = '$telefone2', telefone3 = '$telefone3' WHERE id_cliente = '$id_cliente'");

	header("Location: lista_clientes.php");

} else {

	echo "Acesso negado";

}

?>