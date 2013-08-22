<?php
session_start();
include "conexao.inc.php";

$query = mysql_query("SELECT * from produtos");
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
<table border='1' align="center">
  <tr>
    <td colspan="2" align="center"><h2><a href="produtos.php" style="text-decoration:none;color:#FFF">Cadastrar Produto </a>| <a href="lista_produtos.php"  style="text-decoration:none;color:#FFF">Ver Lista de Produtos</a></h2></td>
  </tr>
  <tr>
    <td>Produto</td>
    <td>Preço</td>
    </tr>
  <?php while($dados = mysql_fetch_array($query)) {?>
  <tr>
    <td><a href="editar_produtos.php?id_produto=<?php echo $dados['id_produto']; ?>" style="text-decoration:none; color:#CCCCCC"><?php echo $dados['nome_produto']; ?></a></td>
    <td>R$ <?php echo $dados['valor_unitario']; ?></td>
    </tr>
  <?php } ?>
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
