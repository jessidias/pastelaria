<//?php
// Verifica se algum pastel foi selecionada
if(isset($_POST['id_produto'])) {
// Faz um loop no Array de checkbox
// A função count retorna a quantidade de checkbox selecionado
for($i = 0; $i < count($_POST['id_produto']); $i++) {
//echo 'O pastel '.$_POST['pastel'][$i].' foi selecionado!;';
}
} else {	
echo"<script>alert ('Favor selecionar o produto!')</script>"; 
echo"<script>history.go(-1);</script>";

}
?>


<?php


// Restrição para apenas receber 
	// valores pelo formulário
	if(isset($_POST['id_produto'])) {
	$id_pedido = $_POST['id_pedido'];
	$id_produto = $_POST['id_produto'];	
	$quantidade = $_POST['quantidade'];	
			
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');

mysql_select_db("test", $con);

if (empty($_POST['id_produto']) ) { 
echo"<script>alert ('Favor selecionar o produto!')</script>"; 
echo"<script>history.go(-1);</script>";
}
else {

for($i = 0; $i < count($_POST['id_produto']); $i++) {
$insere2 = "INSERT INTO pedidos_item (id_pedido, id_produto, quantidade) 
	VALUES ('".$id_pedido."', '".$id_produto."', '".$quantidade."')";
$insereB = mysql_query($insere2);

	header("Location: pedidos.php");

}
}

}else {

	echo "Acesso negado";

}

?>