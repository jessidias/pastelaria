<?php
session_start();
include "conexao.inc.php";

$query = mysql_query("SELECT * from planejamento ORDER BY id DESC");
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
  
<table width="700" border='0' align="center">
			<tr>
	<td align="center" valign="middle">
    <h2><a href="planejamento.php"  style="text-decoration:none;color:#FFF">Cadastrar Planejamento</a> | <a href="lista_clientes.php"  style="text-decoration:none;color:#FFF">Lista de Planejamento </a></h2></td>
		    </tr>
			
            <tr>
              <td><table width="100%" border="0">
                <tr>
                  <td width="120" align="center">Quantidade</td>
                  <td align="center">Data</td>
                  <td width="150" align="center">Dia da semana</td>
                  </tr>
                <?php while($dados = mysql_fetch_array($query)) {?>
			<tr>
				<td align="center"><a href="editar_planejamento.php?id=<?php echo $dados['id']; ?>" style="text-decoration:none; color:#CCCCCC"><?php echo $dados['quant']; ?></a></td>
                <td align="center"><?php echo $dados['data']; ?></td>
      		    <td align="center"><?php echo $dados['dia']; ?></td>
                </tr>
	   <?php } ?>
              </table></td>
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
