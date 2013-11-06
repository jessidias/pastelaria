<?php


	if(isset($_POST["acao"])) {
		
	$id_cliente = $_POST['id_cliente'];	
	$data_1 = $_POST['data_1'];
	$data_2 = $_POST['data_2'];
	$valor_total = $_POST['valor_total'];
	$obs = $_POST['obs'];

	$id_produto = $_POST['id_produto'];
	$quantidade = $_POST['quantidade'];
	
		

$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');

mysql_select_db("test", $con);

if (empty($_POST['id_cliente']) ) { 
echo"<script>alert ('Favor selecionar o cliente!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['id_produto']) ) { 
echo"<script>alert ('Favor selecionar o produto!')</script>"; 
echo"<script>history.go(-1);</script>";
}
/*elseif (empty($_POST['$quantidade']) ) { 
echo"<script>alert ('Favor selecionar a quantidade!')</script>"; 
echo"<script>history.go(-1);</script>";
}*/
elseif (empty($_POST['data_1']) ) { 
echo"<script>alert ('Favor colocar a data em que o pedido foi realizado!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['data_2']) ) { 
echo"<script>alert ('Favor colocar a data em que o pedido será entregue!')</script>"; 
echo"<script>history.go(-1);</script>";
}
else {

$sqlD = "SELECT ( planejamento.quant ) - sum( quantidade ) AS sub
FROM pedidos_item
INNER JOIN pedidos ON pedidos_item.id_pedido = pedidos.id_pedidos
INNER JOIN planejamento
WHERE data_entrega LIKE  '%$amanha%'
AND data LIKE  '%$hoje%'";
$sqlD_res = mysql_query($sqlD) or die ('ERRO: pesquisar sub');

if ($sub > $quantidade[$id_produto]){
	echo "Não pode inserir"; }
	else {


$insere1 = "INSERT INTO pedidos (id_cliente, data_pedido, data_entrega, valor_total, obs) 
	VALUES ('".$id_cliente."', '".$data_1."', '".$data_2."', '".$valor_total."', '".$obs."')";
$insereA = mysql_query($insere1);


	$sql_pega_pedido = mysql_query("SELECT * FROM pedidos ORDER BY id_pedidos DESC LIMIT 1");
    $linha = mysql_fetch_assoc($sql_pega_pedido);
    $id_pedido = $linha['id_pedidos'];
	

foreach ($id_produto as $key => $id_produto){
$insere2 = "INSERT INTO pedidos_item (id_pedido, id_produto, quantidade) 
	VALUES ('".$id_pedido."','".$id_produto."', '".$quantidade[$id_produto]."')";
$insereB = mysql_query($insere2);

	header("Location: pedidos.php?msg=0");

}
}
}
}else {

	echo "Acesso negado";

}

?>