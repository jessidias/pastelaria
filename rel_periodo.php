<?php

	if(isset($_POST["acao"])) {
		
	$periodo1 = $_POST['periodo1'];
	$periodo2 = $_POST['periodo2'];

		
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');
mysql_select_db("test", $con);

if (empty($_POST['periodo1']) ) { 
echo"<script>alert ('Favor informar o período!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['periodo2']) ) { 
echo"<script>alert ('Favor informar o período!')</script>"; 
echo"<script>history.go(-1);</script>";
}

$query = "SELECT nome_produto, SUM( quantidade ) AS quant
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE data_entrega BETWEEN '$periodo1' and '$periodo2'
GROUP BY produtos.id_produto
ORDER BY quant DESC";
$result = mysql_query($query) or die(mysql_error());

	
	echo "Você digitou o período entre $periodo1 e $periodo2";
	echo "<br />";
	echo "<br />";
	while($row = mysql_fetch_array($result)){
	echo "Total ". $row['nome_produto']. " = ". $row['quant'];
	echo "<br />";
}
		
} else {

	echo "Acesso negado";

}

?>