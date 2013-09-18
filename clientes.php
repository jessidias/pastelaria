<?php
include "conexao.inc.php";
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema Web de Controle de Pedidos</title>
<style type="text/css" media="all">
			@import "css/estilos.css";		
			</style>
</head>

<body>
<div id="todos"> 
			
 			   
  				<div id="menuh"><?php include("topo.php"); ?></div>
				
				
				
 				<div id="texto">
              
          <table width="998" border="0">
  <tr>
    <td>
    <div style="padding-left:250px;padding-top:10px"> 
     <form action="pesquisa_clientes.php" method="post">
      Buscar clientes:
      <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
     
    
      <select name="categoria">
			<option value="nome">Nome</option>
			<option value="cpf">CPF</option>
			<option value="cnpj">CNPJ</option>
		</select>
        <input type="submit" name="acao" value="Ok"/>
      </form>
</div> <br />
<br />
<form action="cadastra_cliente.php" method="post">
<table width="500"  border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h2><a href="clientes.php"  style="text-decoration:none;color:#FFF">Cadastrar Cliente</a> | <a href="lista_clientes.php"  style="text-decoration:none;color:#FFF">Ver Lista de Clientes</a></h2></td>
    </tr>
  <tr>
    <td width="161">Nome*:</td>
    <td width="335">
      <input name="nome_cliente" type="text" id="nome_cliente" /></td>
    </tr>
  <tr>
    <td> CPF*:</td>
    <td><input type="text" name="cpf" id="cpf" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Apenas para cadastro de pessoa física.</td>
  </tr>
  <tr>
    <td>CNPJ*:</td>
    <td><input type="text" name="cnpj" id="cnpj" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Apenas para cadastro de pessoa jurídica.</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td>Endereço*:</td>
    <td><input name="endereco" type="text" id="endereco" size="37" /></td>
    </tr>
  <tr>
    <td>Número*:</td>
    <td><input name="numero" type="text" id="numero" size="1" /></td>
    </tr>
  <tr>
    <td>Bairro:</td>
    <td><input name="bairro" type="text" id="bairro" size="37" /></td>
    </tr>
  <tr>
    <td>Complemento:</td>
    <td><input name="complemento" type="text" id="complemento" size="37" /></td>
    </tr>
  <tr>
    <td>Telefone Comercial*:</td>
    <td><input type="text" name="telefone1" id="telefone1" /></td>
  </tr>
  <tr>
    <td>Telefone Residencial:</td>
    <td><input type="text" name="telefone2" id="telefone2" /></td>
  </tr>
  <tr>
    <td> Telefone Celular: </td>
    <td><input type="text" name="telefone3" id="telefone3" /></td>
  </tr>
  <tr>
    <td>* campos obrigatórios</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="acao" value="Enviar" />      <input type="reset" value="Limpar" /></td>
  </tr>
  </table>
</form>
</td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
