<?php


// Restri��o para apenas receber 
	// valores pelo formul�rio
	if(isset($_POST["acao"])) {
		
// realiza a conex�o com a base de dados
	require("conexao.inc.php");
	
// recebe os valores digitados no formul�rio
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	
		// cria a consulta com as informa��es 
	// recebidas do formul�rio
	// utiliza md5() pois a senha est� criptografada
	// no banco de dados
	$sql = "SELECT id, nome_cliente FROM admin
			WHERE usuario='".$usuario."' AND 
				  senha='".$senha."'";
	
	// atribui a vari�vel a consulta
	$banco->atribuir("sql", $sql);
	
	// executa a consulta na base de dados
	$retorno = $banco->executar();
	
	// utilizar esta fun��o quando
	// a SQL retornar apenas uma linha de
	// registro, o valor num�rico corresponde
	// a coluna que se deseja recuperar
	$resultado = mysql_fetch_array($retorno) 
				 or die("Usu�rio e/ou Senha inv�lidos.");
	
	// criar a sess�o para o usu�rio
	session_start();
	
	$_SESSION["nomecompleto"] = $resultado["nome_cliente"];
	$_SESSION["idcliente"] = $resultado["id"];
	
	// d = dia 
	// m = m�s
	// y = ano (2 d�gitos) Y = ano (4 d�gitos)
	// h = hora (12 horas) H = hora (24 horas)
	// i = minutos
	// s = segundos
	$_SESSION["datahora"] = date("d/m/Y H:i:s");
	
	// fun��o session_id cria um id �nico
	// para a sess�o ativa
	$_SESSION["id"] = session_id();
	
	header("Location: index.php");

} else {

	echo "Acesso negado";

}

?>