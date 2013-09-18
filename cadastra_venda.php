<?php


	// Restrição para apenas receber 
	// valores pelo formulário
	if(isset($_POST["acao"])) {
	
	$id_pedidos = $_POST['id_pedidos'];		
	$valor_pago = $_POST['valor_pago'];	
	
	
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');

mysql_select_db("test", $con);

if (empty($_POST['valor_pago']) ) { 
echo"<script>alert ('Favor colocar o valor pago na venda!')</script>"; 
echo"<script>history.go(-1);</script>";
}
else{
	
mysql_query("UPDATE pedidos SET valor_pago = '$valor_pago' WHERE id_pedidos = '$id_pedidos'");

	header("Location: vendas.php");

}
} else {

	echo "Acesso negado";

}
	
?>