<?php


	if(isset($_POST["acao2"])) {
		
	$mensal = $_POST['mensal'];
		
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');
mysql_select_db("test", $con);


$query = "SELECT nome_produto, SUM( quantidade ) AS quant
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN produtos ON pedidos_item.id_produto = produtos.id_produto
WHERE data_entrega LIKE  '%$mensal%'
GROUP BY produtos.id_produto
ORDER BY quant DESC";
$result = mysql_query($query) or die(mysql_error());

if ($mensal == '/01/2013'){
echo "Você escolheu o mês Janeiro";
}
if ($mensal == '/02/2013'){
echo "Você escolheu o mês Fevereiro";
}
if ($mensal == '/03/2013'){
echo "Você escolheu o mês Março";
}
if ($mensal == '/04/2013'){
echo "Você escolheu o mês Abril";
}
if ($mensal == '/05/2013'){
echo "Você escolheu o mês Maio";
}
if ($mensal == '/06/2013'){
echo "Você escolheu o mês Junho";
}
if ($mensal == '/07/2013'){
echo "Você escolheu o mês Julho";
}
if ($mensal == '/08/2013'){
echo "Você escolheu o mês Agosto";
}
if ($mensal == '/09/2013'){
echo "Você escolheu o mês Setembro";
}
if ($mensal == '/10/2013'){
echo "Você escolheu o mês Outubro";
}
if ($mensal == '/11/2013'){
echo "Você escolheu o mês Novembro";
}
if ($mensal == '/12/2013'){
echo "Você escolheu o mês Dezembro";
}
	echo "<br />";echo "<br />";
	while($row = mysql_fetch_array($result)){
	echo "Total ". $row['nome_produto']. " = ". $row['quant'];
	echo "<br />";
	
 }
		
 } else {

	echo "Acesso negado";

}

?>