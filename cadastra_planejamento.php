<?php


// Restrição para apenas receber 
	// valores pelo formulário
	if(isset($_POST["acao2"])) {
		
	$quant= $_POST['quant'];
	$data = $_POST['data'];
	$dia = $_POST['dia'];
		
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');

mysql_select_db("test", $con);

if (empty($_POST['quant']) ) { 
echo"<script>alert ('Favor colocar a quantidade!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['data']) ) { 
echo"<script>alert ('Favor colocar a data!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['dia']) ) { 
echo"<script>alert ('Favor colocar o dia da semana!')</script>"; 
echo"<script>history.go(-1);</script>";
}
 

mysql_query("INSERT INTO planejamento (quant, data, dia) 
	VALUES ('".$quant."', '".$data."', '".$dia."')");


	header("Location: planejamento.php");
	

} else {

	echo "Acesso negado";

}

?>