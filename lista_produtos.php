<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include "conexao.inc.php";

$pagina = $_GET['pagina'];

$sqlN = "SELECT * from produtos";
$sql_resN = mysql_query($sqlN) or die ("ERRO CONSULTA.");

$qtd = mysql_num_rows($sql_resN);
$lpp = 6;
$paginas = ceil($qtd / $lpp);

if(!isset($pagina)) { $pagina = 0; }
$inicio = $pagina * $lpp;

$sqlN = "SELECT * from produtos LIMIT $inicio, $lpp";
$sql_resN = mysql_query($sqlN) or die ("ERRO CONSULTA.");


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
      
</div>
<table border='0' align="center">
  <tr>
    <td colspan="2" align="center"><h2><a href="produtos.php" style="text-decoration:none;color:#FFF">Cadastrar Produto </a>| <a href="lista_produtos.php"  style="text-decoration:none;color:#FFF">Ver Lista de Produtos</a></h2></td>
  </tr>
  <tr>
    <td width="310" style="font-size:26px;padding-left:50px">Produto</td>
    <td width="195" style="font-size:26px">Preço</td>
    </tr>
  <?php while($dados = mysql_fetch_array($sql_resN)) {?>
  <tr>
    <td><a href="editar_produtos.php?id_produto=<?php echo $dados['id_produto']; ?>" style="text-decoration:none; color:#000066; padding-left:50px"><?php echo $dados['nome_produto']; ?></a></td>
    <td>R$ <?php echo $dados['valor_unitario']; ?></td>
    </tr>
  <?php } ?>
</table>
 <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="left"><?php
			  if($pagina > 0){
				$menos = $pagina - 1;
				$url = "lista_produtos.php?pagina=$menos";
				echo "<a href='$url' style='text-decoration:none;color:#fff' ><<</a>";
			  }
			  ?></div></td>
            <td><div align="center" >
      <?php
			  for($i=0;$i<$paginas;$i++) { 
				$url = "lista_produtos.php?pagina=$i";
				$numpag = $i + 1;
				if ($pagina+1 == $numpag){
					echo "        <b><a class='menuInterno' href='$url' style='text-decoration:none;color:#fff'>$numpag</a></b>";
				}	else {
						echo "        <a href='$url' style='text-decoration:none;color:#fff'>$numpag</a>";
					}
			  }
			  ?>
    </div></td>
            <td><div align="right">
      <?php
			  if($pagina < $paginas-1){
				$mais = $pagina + 1;
				$url = "lista_produtos.php?pagina=$mais";
				echo "<a href='$url' style='text-decoration:none;color:#fff'>>></a>";
			  }
			  ?>
    </div></td>
          </tr>
        </table>

</td>
  </tr>
</table>
</td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
