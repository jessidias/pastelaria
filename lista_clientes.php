<?php
session_start();
include "conexao.inc.php";

$query = mysql_query("SELECT * from clientes where status = 'S'");
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
  <br />
<br />

<table border='1' align="center">
			<tr>
			  <td colspan="6" align="center"><h2><a href="clientes.php" style="text-decoration:none;color:#FFF">Cadastrar Cliente </a>| <a href="lista_clientes.php"  style="text-decoration:none;color:#FFF">Ver Lista de Clientes</a></h2></td>
		    </tr>
			<tr>
				<td>Nome</td>
    		    <td>CPF</td>
                <td>CNPJ</td>
                <td>E-mail</td>
				<td>Telefone Comercial</td>
                <td>Endereço</td>
            </tr>
	
		<?php while($dados = mysql_fetch_array($query)) {?>
			<tr>
				<td><a href="editar_clientes.php?id_cliente=<?php echo $dados['id_cliente']; ?>" style="text-decoration:none; color:#CCCCCC"><?php echo $dados['nome_cliente']; ?></a></td>
                <td><?php echo $dados['cpf']; ?></td>
				<td><?php echo $dados['cnpj']; ?></td>
                <td><?php echo $dados['email']; ?></td>
      		    <td><?php echo $dados['telefone1']; ?></td>
                <td><?php echo $dados['endereco']; ?></td>
   		    </tr>
	   <?php } ?>

	</table>

</td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
