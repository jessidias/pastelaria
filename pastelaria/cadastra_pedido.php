<?php


// Restrição para apenas receber 
	// valores pelo formulário
	if(isset($_POST["acao"])) {
		
	$id_cliente = $_POST['id_cliente'];	
	$data_pedido = $_POST['data_pedido'];
	$data_entrega = $_POST['data_entrega'];
	$valor_total = $_POST['valor_total'];
	$obs = $_POST['obs'];

	//$id_pedido = $_POST['id_pedido'];
	$id_produto = $_POST['id_produto'];
	$quantidade = $_POST['quantidade'];
	
$con = mysql_connect("localhost", "root", "12345") or die('Não foi possível conectar');

mysql_select_db("test", $con);

if (empty($_POST['id_cliente']) ) { 
echo"<script>alert ('Favor selecionar o cliente!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['data_pedido']) ) { 
echo"<script>alert ('Favor colocar a data em que o pedido foi realizado!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['data_entrega']) ) { 
echo"<script>alert ('Favor colocar a data em que o pedido será entregue!')</script>"; 
echo"<script>history.go(-1);</script>";
}
else {

$insere1 = "INSERT INTO pedidos (id_cliente, data_pedido, data_entrega, valor_total, obs) 
	VALUES ('".$id_cliente."', '".$data_pedido."', '".$data_entrega."', '".$valor_total."', '".$obs."')";
$insereA = mysql_query($insere1);

//for($i=0;$i<count($_POST['pastel']);$i++){
foreach ($id_produto as $key => $id_produto){
$insere2 = "INSERT INTO pedidos_item (id_produto, quantidade) 
	VALUES ('".$id_produto."', '".$quantidade."')";
$insereB = mysql_query($insere2);

	header("Location: pedidos.php");
}
//}
}
}else {

	echo "Acesso negado";

}

?>