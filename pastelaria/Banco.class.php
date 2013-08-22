<?php

class Banco {

	// atributos da classe
	private $host;
	private $user;
	private $pass;
	private $dbs;
	private $sql;
	
	// conexуo com a base de dados
	function conexao() {
		$con = mysql_connect($this->host, $this->user, $this->pass) 
			   or die("Erro: ".mysql_error());
		return $con;		
	}
	
	// seleчуo de banco de dados
	function selecionaDB() {
		$sel = mysql_select_db($this->dbs) 
			   or die("Erro: ".mysql_error());
	}
	
	// mщtodo para executar consultas sql
	function executar() {
		$query = mysql_query($this->sql)
			     or die("Erro: ".mysql_error());
		return $query;
	}
	
	// setter dinтmico para atribuiчуo
	// de valores aos atributos
	function atribuir($prop, $valor) {
		$this->$prop = $valor;
	}
	
	// getter dinтmico para recuperaчуo
	// dos valores dos atributos
	function retornar($prop) {
		return $this->$prop;
	}
	
	// fechamento de conexуo com base de dados
	function fechar() {
		mysql_close();
	}
}
?>