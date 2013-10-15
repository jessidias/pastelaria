<?php
session_start();
include "conexao.inc.php";

$id = $_GET['id'];

$query = mysql_query("SELECT * FROM planejamento WHERE id='$id'");
$dados = mysql_fetch_array($query);

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
      
</div><br />
<br />

<form action="editar_planejamento2.php" method="post">
<table width="500"  border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h2><a href="planejamento.php"  style="text-decoration:none;color:#FFF">Planejamento</a></h2></td>
    </tr>
  <tr>
    <td width="161">Quantidade de pastéis do dia: </td>
    <td width="335">
      <input name="quant" type="text" value="<?php echo $dados['quant']; ?>" /></td>
    </tr>
  <tr>
    <td> Data:</td>
    <td><input type="text" name="data" value="<?php echo $dados['data']; ?>" /></td>
    </tr>
  <tr>
    <td>Dia da semana:</td>
    <td><input type="text" name="dia" value="<?php echo $dados['dia']; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left">Todos os  campos são obrigatórios</td>
    </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="acao" value="Editar Planejamento" />
      <input name="id" type="hidden" value="<?php echo $dados["id"]; ?>" /></td>
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
