<?php


	if(isset($_POST["acao2"])) {
		
	$mensal = $_POST['mensal'];
		
$con = mysql_connect("localhost", "test", "") or die('N�o foi poss�vel conectar');
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
echo "Voc� escolheu o m�s Janeiro";
}
if ($mensal == '/02/2013'){
echo "Voc� escolheu o m�s Fevereiro";
}
if ($mensal == '/03/2013'){
echo "Voc� escolheu o m�s Mar�o";
}
if ($mensal == '/04/2013'){
echo "Voc� escolheu o m�s Abril";
}
if ($mensal == '/05/2013'){
echo "Voc� escolheu o m�s Maio";
}
if ($mensal == '/06/2013'){
echo "Voc� escolheu o m�s Junho";
}
if ($mensal == '/07/2013'){
echo "Voc� escolheu o m�s Julho";
}
if ($mensal == '/08/2013'){
echo "Voc� escolheu o m�s Agosto";
}
if ($mensal == '/09/2013'){
echo "Voc� escolheu o m�s Setembro";
}
if ($mensal == '/10/2013'){
echo "Voc� escolheu o m�s Outubro";
}
if ($mensal == '/11/2013'){
echo "Voc� escolheu o m�s Novembro";
}
if ($mensal == '/12/2013'){
echo "Voc� escolheu o m�s Dezembro";
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