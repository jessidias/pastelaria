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
    <td><div style="padding-left:250px;padding-top:10px">
      <form action="pesquisa_produtos.php" method="post">
      Buscar produtos:
      <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
     
    
      <select name="categoria">
			<option value="nome">Nome</option>
			
		</select>
        <input type="submit" name="acao" value="Ok"/>
      </form>
</div><br />
<table width="600" border="0" align="center">
  <tr>
    <td colspan="3" align="center"><h2><a href="produtos.php" style="text-decoration:none;color:#FFF">Cadastrar Produto</a> | <a href="lista_produtos.php" style="text-decoration:none;color:#FFF">Ver Lista de Produtos</a></h2></td>
  </tr>
  <form action="cadastra_produto.php" method="post">
  <tr>
    <td colspan="3" align="center"><?php if($_GET['msg']=="0"){ echo "<font color='#FFFFFF'>Produto cadastrado com sucesso.</font>";} ?>
                  <?php if($_GET['msg']=="1"){ echo "<font color='#CC0000'>Este produto já está cadastrado.</font>";} ?></td>
    </tr>
  <tr>
    <td width="214" align="right">Produto*: </td>
    <td width="376" colspan="2" align="left">
      <input name="nome_produto" type="text" id="nome_produto" size="43" /></td>
  </tr>
  <tr>
    <td align="right">Preço (R$)*:</td>
    <td colspan="2" align="left"><input name="valor_unitario" type="text" id="valor_unitario" size="43" /></td>
  </tr>
  <tr>
    <td align="right"><span style="font-size:smaller">*campos obrigatórios</span></td>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" style="padding-left:130px"><input type="submit" name="acao" id="acao" value="Enviar" style="font-size:20px"/> <input type="reset" name="acao" id="acao" value="Limpar" style="font-size:20px"/></td>
  </tr>
  </form>
      </table></td>
  </tr>
</table>
<br /></td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
