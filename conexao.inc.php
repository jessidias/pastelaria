<?php 

// inclui o arquivo de Classe para conex�o com 
// a base de dados
require("Banco.class.php");

// inst�ncia do objeto da classe Banco
$banco = new Banco();

// inicializa��o de atributos
// mesma coisa se utilizar setters
$banco->atribuir("host", "localhost");
$banco->atribuir("user", "root");
$banco->atribuir("pass", "");
$banco->atribuir("dbs", "test");

// realiza a conex�o com a base de dados
$con = $banco->conexao();

// faz a sele��o do banco de dados 
$banco->selecionaDB();

?>