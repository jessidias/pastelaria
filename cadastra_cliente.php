<?php

	if(isset($_POST["acao"])) {
		
	$nome_cliente = $_POST['nome_cliente'];
	$cpf = $_POST['cpf'];
	$cnpj = $_POST['cnpj'];
	$email = $_POST['email'];
	$telefone1 = $_POST['telefone1'];
	$telefone2 = $_POST['telefone2'];
	$telefone3 = $_POST['telefone3'];	
	$endereco = $_POST['endereco'];	
	$numero = $_POST['numero'];	
	$bairro = $_POST['bairro'];	
	$complemento = $_POST['complemento'];	

		
$con = mysql_connect("localhost", "test", "") or die('Não foi possível conectar');

mysql_select_db("test", $con);

if (empty($_POST['nome_cliente']) ) { 
echo"<script>alert ('Favor colocar seu nome!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['cpf']) xor ($_POST['cnpj'])) { 
echo"<script>alert ('Favor colocar seu cpf/cnpj!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['telefone1']) ) { 
echo"<script>alert ('Favor colocar seu telefone!')</script>"; 
echo"<script>history.go(-1);</script>";
}
elseif (empty($_POST['endereco']) ) { 
echo"<script>alert ('Favor colocar seu endereço!')</script>"; 
echo"<script>history.go(-1);</script>";
}
else {
$pesquisa = "SELECT * FROM clientes WHERE nome_cliente = '$nome_cliente'";
$res = mysql_query($pesquisa) or die(mysql_error());	
$rowsn = mysql_num_rows($res);

if ($rowsn == '0'){
mysql_query("INSERT INTO clientes (nome_cliente, cpf, cnpj, email, telefone1, telefone2, telefone3, endereco, numero, bairro, complemento) 
	VALUES ('".$nome_cliente."', '".$cpf."', '".$cnpj."', '".$email."', '".$telefone1."', '".$telefone2."', '".$telefone3."', '".$endereco."', '".$numero."', '".$bairro."', '".$complemento."')");
header("Location: clientes.php?msg=0");
} 
else {header("Location: clientes.php?msg=1"); }


}
} else {

	echo "Acesso negado";

}

?>