<?php


// Restri��o para apenas receber 
	// valores pelo formul�rio
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

		
$con = mysql_connect("localhost", "test", "") or die('N�o foi poss�vel conectar');

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
echo"<script>alert ('Favor colocar seu endere�o!')</script>"; 
echo"<script>history.go(-1);</script>";
}

else {
echo"<script>alert ('Cliente cadastrado com sucesso!')</script>"; 

mysql_query("INSERT INTO clientes (nome_cliente, cpf, cnpj, email, telefone1, telefone2, telefone3, endereco, numero, bairro, complemento) 
	VALUES ('".$nome_cliente."', '".$cpf."', '".$cnpj."', '".$email."', '".$telefone1."', '".$telefone2."', '".$telefone3."', '".$endereco."', '".$numero."', '".$bairro."', '".$complemento."')");


	

	header("Location: clientes.php");
	
}
} else {

	echo "Acesso negado";

}

?>