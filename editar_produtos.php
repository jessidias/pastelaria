<?php
include "conexao.inc.php";
session_start();

$id_produto = $_GET["id_produto"];

$query = mysql_query("SELECT * FROM produtos WHERE id_produto='$id_produto'");
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
     
      <form action="pesquisa_produtos.php" method="post">
      Buscar produtos:
      <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
     
    
      <select name="categoria">
			<option value="nome">Nome</option>
			
		</select>
        <input type="submit" name="acao" value="Ok"/>
      </form>
      
</div><br />
<br />

<form action="editar_produtos2.php" method="post">
<table width="500"  border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h2><a href="produtos.php"  style="text-decoration:none;color:#FFF">Cadastrar Produto</a> | <a href="lista_produtos.php"  style="text-decoration:none;color:#FFF">Ver Lista de Produtos</a></h2></td>
    </tr>
  <tr>
    <td width="161">Produto*: </td>
    <td width="335">
      <input name="nome_produto" type="text" value="<?php echo $dados['nome_produto']; ?>" /></td>
    </tr>
  <tr>
    <td> Preço (R$)*:</td>
    <td><input type="text" name="valor_unitario" value="<?php echo $dados['valor_unitario']; ?>" /></td>
    </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="acao" value="Editar Produto" />
      <input name="id_produto" type="hidden" value="<?php echo $dados["id_produto"]; ?>" /></td>
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
