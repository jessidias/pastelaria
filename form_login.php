<?php


// Restrição para apenas receber 
	// valores pelo formulário
	if(isset($_POST["acao"])) {
		
// realiza a conexão com a base de dados
	require("conexao.inc.php");
	
// recebe os valores digitados no formulário
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	
		// cria a consulta com as informações 
	// recebidas do formulário
	// utiliza md5() pois a senha está criptografada
	// no banco de dados
	$sql = "SELECT id, nome_cliente FROM admin
			WHERE usuario='".$usuario."' AND 
				  senha='".$senha."'";
	
	// atribui a variável a consulta
	$banco->atribuir("sql", $sql);
	
	// executa a consulta na base de dados
	$retorno = $banco->executar();
	
	// utilizar esta função quando
	// a SQL retornar apenas uma linha de
	// registro, o valor numérico corresponde
	// a coluna que se deseja recuperar
	$resultado = mysql_fetch_array($retorno) 
				 or die("Usuário e/ou Senha inválidos.");
	
	// criar a sessão para o usuário
	session_start();
	
	$_SESSION["nomecompleto"] = $resultado["nome_cliente"];
	$_SESSION["idcliente"] = $resultado["id"];
	
	// d = dia 
	// m = mês
	// y = ano (2 dígitos) Y = ano (4 dígitos)
	// h = hora (12 horas) H = hora (24 horas)
	// i = minutos
	// s = segundos
	$_SESSION["datahora"] = date("d/m/Y H:i:s");
	
	// função session_id cria um id único
	// para a sessão ativa
	$_SESSION["id"] = session_id();
	
	header("Location: index.php");

} else {

	echo "Acesso negado";

}

?>