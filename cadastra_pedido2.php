<?php


	$id_produto = $_POST['pastel'];	
	$quantidade = $_POST['qtd'];	
			
	$teste = array($_POST['pastel']);		
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');

mysql_select_db("test", $con);


if (empty($_POST['pastel']) ) { 
echo"<script>alert ('Favor selecionar o produto!')</script>"; 
echo"<script>history.go(-1);</script>";
}

else {
foreach($teste as $value) {
$value = mysql_query("INSERT INTO pedidos_item (id_produto, quantidade) 
	VALUES ('".$id_produto."', '".$quantidade."')");
}
	header("Location: pastel.php");

}

?>