<?php
	// iniciar sessão
	session_start();
	
	// se a sessão não estiver ativa direciona para o login
	if(!isset($_SESSION["id"])) {
		session_destroy();
		header("Location: login.php");
	}
?>