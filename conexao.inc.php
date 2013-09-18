<?php 

// inclui o arquivo de Classe para conexão com 
// a base de dados
require("Banco.class.php");

// instância do objeto da classe Banco
$banco = new Banco();

// inicialização de atributos
// mesma coisa se utilizar setters
$banco->atribuir("host", "localhost");
$banco->atribuir("user", "root");
$banco->atribuir("pass", "");
$banco->atribuir("dbs", "test");

// realiza a conexão com a base de dados
$con = $banco->conexao();

// faz a seleção do banco de dados 
$banco->selecionaDB();

?>