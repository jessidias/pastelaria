<?php
	// iniciar sess�o
	session_start();
	
	// se a sess�o n�o estiver ativa direciona para o login
	if(!isset($_SESSION["id"])) {
		session_destroy();
		header("Location: login.php");
	}
?>