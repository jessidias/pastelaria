<?php


	// Restrição para apenas receber 
	// valores pelo formulário
	if(isset($_POST["acao"])) {
		
	$nome_produto = $_POST['nome_produto'];	
	$valor_unitario = $_POST['valor_unitario'];	
	

		
$con = mysql_connect("localhost", "root", "12345") or die('Não foi possível conectar');

mysql_select_db("test", $con);

if (empty($_POST['nome_produto']) ) { 
echo"<script>alert ('Favor colocar o nome do produto!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['valor_unitario']) ) { 
echo"<script>alert ('Favor colocar o valor do produto!')</script>"; 
echo"<script>history.go(-1);</script>";
}
else{
	
mysql_query("INSERT INTO produtos (nome_produto, valor_unitario) 
VALUES ('".$nome_produto."','".$valor_unitario."')");

	header("Location: produtos.php");

}
} else {

	echo "Acesso negado";

}
	
?>