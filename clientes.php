<?php
error_reporting(E_ERROR | E_PARSE);
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
</div>
<form action="cadastra_cliente.php" method="post">
  <table width="600"  border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h2><a href="clientes.php"  style="text-decoration:none;color:#FFF">Cadastrar Cliente</a> | <a href="lista_clientes.php"  style="text-decoration:none;color:#FFF">Ver Lista de Clientes</a></h2></td>
    </tr>
  <tr>
    <td height="30" colspan="2" valign="top">
	<center><?php if($_GET['msg']=="0"){ echo "<font color='#FFFFFF'>Cadastro realizado com sucesso.</font>";} ?>
                  <?php if($_GET['msg']=="1"){ echo "<font color='#CC0000'>Este cliente já está cadastrado.</font>";} ?></center></td>
    </tr>
  <tr>
    <td width="161">Nome*:</td>
    <td width="335">
      <input name="nome_cliente" type="text" id="nome_cliente" style="border-radius:10px" size="43" /></td>
    </tr>
  <tr>
    <td> CPF*:</td>
    <td><input name="cpf" type="text" id="cpf" style="border-radius:10px" size="43"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="font-size:smaller">Apenas para cadastro de pessoa física.</td>
  </tr>
  <tr>
    <td>CNPJ*:</td>
    <td><input name="cnpj" type="text" id="cnpj" style="border-radius:10px" size="43"/></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td  style="font-size:smaller">Apenas para cadastro de pessoa jurídica.</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input name="email" type="text" id="email" style="border-radius:10px" size="43"/></td>
  </tr>
  <tr>
    <td>Endereço*:</td>
    <td><table width="100">
      <tr>
          <td><input name="endereco" type="text" id="endereco" style="border-radius:10px"/></td>
          <td>Número:*</td>
          <td><input name="numero" type="text" id="numero" size="1" style="border-radius:10px"/></td>
        </tr>
    </table></td>
    </tr>
  <tr>
    <td>Bairro:</td>
    <td><input name="bairro" type="text" id="bairro" style="border-radius:10px" size="43"/></td>
  </tr>
  <tr>
    <td>Complemento:</td>
    <td><input name="complemento" type="text" id="complemento" style="border-radius:10px" size="43"/></td>
    </tr>
  <tr>
    <td>Telefone Comercial*:</td>
    <td><input name="telefone1" type="text" id="telefone1"style="border-radius:10px" size="43" /></td>
  </tr>
  <tr>
    <td>Telefone Residencial:</td>
    <td><input name="telefone2" type="text" id="telefone2" style="border-radius:10px" size="43"/></td>
  </tr>
  <tr>
    <td> Telefone Celular: </td>
    <td><input name="telefone3" type="text" id="telefone3" style="border-radius:10px" size="43"/></td>
  </tr>
  <tr>
    <td style="font-size:smaller">* campos obrigatórios</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="acao" value="Enviar" style="font-size:20px" />      <input type="reset" value="Limpar" style="font-size:20px"/></td>
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
