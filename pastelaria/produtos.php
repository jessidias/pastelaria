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
    <td><div style="padding-left:250px;padding-top:10px">
      <form action="pesquisa_produtos.php" method="post">Buscar:
      <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
     
    
      <select name="categoria">
			<option value="nome">Nome</option>
			
		</select>
        <input type="submit" name="acao" value="Ok"/>
      </form>
</div><br />
<table width="500" border="0" align="center">
  <tr>
    <td colspan="3" align="center"><h2><a href="produtos.php" style="text-decoration:none;color:#FFF">Cadastrar Produto</a> | <a href="lista_produtos.php" style="text-decoration:none;color:#FFF">Ver Lista de Produtos</a></h2></td>
  </tr>
  <form action="cadastra_produto.php" method="post">
  <tr>
    <td width="124">Produto*: </td>
    <td width="354" colspan="2">
      <input type="text" name="nome_produto" id="nome_produto" /></td>
  </tr>
  <tr>
    <td>Preço (R$)*:</td>
    <td colspan="2"><input name="valor_unitario" type="text" id="valor_unitario" /></td>
  </tr>
  <tr>
    <td colspan="3">*campos obrigatórios</td>
    </tr>
  <tr>
    <td colspan="3" style="padding-left:130px"><input type="submit" name="acao" id="acao" value="Enviar" /> <input type="reset" name="acao" id="acao" value="Limpar" /></td>
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
