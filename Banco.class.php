<?php

class Banco {

	// atributos da classe
	private $host;
	private $user;
	private $pass;
	private $dbs;
	private $sql;
	
	// conex�o com a base de dados
	function conexao() {
		$con = mysql_connect($this->host, $this->user, $this->pass) 
			   or die("Erro: ".mysql_error());
		return $con;		
	}
	
	// sele��o de banco de dados
	function selecionaDB() {
		$sel = mysql_select_db($this->dbs) 
			   or die("Erro: ".mysql_error());
	}
	
	// m�todo para executar consultas sql
	function executar() {
		$query = mysql_query($this->sql)
			     or die("Erro: ".mysql_error());
		return $query;
	}
	
	// setter din�mico para atribui��o
	// de valores aos atributos
	function atribuir($prop, $valor) {
		$this->$prop = $valor;
	}
	
	// getter din�mico para recupera��o
	// dos valores dos atributos
	function retornar($prop) {
		return $this->$prop;
	}
	
	// fechamento de conex�o com base de dados
	function fechar() {
		mysql_close();
	}
}
?>