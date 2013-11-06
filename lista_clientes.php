<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include "conexao.inc.php";

$pagina = $_GET['pagina'];

$sqlN = "SELECT * from clientes ORDER BY nome_cliente DESC";
$sql_resN = mysql_query($sqlN) or die ("ERRO CONSULTA.");

$qtd = mysql_num_rows($sql_resN);
$lpp = 6;
$paginas = ceil($qtd / $lpp);

if(!isset($pagina)) { $pagina = 0; }
$inicio = $pagina * $lpp;

$sqlN = "SELECT * from clientes ORDER BY nome_cliente DESC LIMIT $inicio, $lpp";
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
 <table width="700" border='0' align="center">
			<tr>
	<td align="center" valign="middle">
    <h2><img src="imgs/icone_cadastro.png" width="40" height="40" /><a href="clientes.php"  style="text-decoration:none;color:#FFF">Cadastrar Cliente</a> | <a href="lista_clientes.php"  style="text-decoration:none;color:#FFF">Lista de Clientes </a>
    <img src="imgs/icone_lista.png" width="30" height="30" /></h2></td>
		    </tr>
			
            <tr>
              <td><table width="100%" border="0">
                <tr>
                  <td width="207" align="left" style="font-size:26px"><strong>Nome</strong></td>
                  <td width="225" align="left" style="font-size:26px"><strong>Telefone Comercial</strong></td>
                  <td width="248" align="left" style="font-size:26px"><strong>Endereço</strong></td>
                </tr>
                <?php while($dados = mysql_fetch_array($sql_resN)) {?>
			<tr>
				<td align="left"><a href="editar_clientes.php?id_cliente=<?php echo $dados['id_cliente']; ?>" style="text-decoration:none; color:#000066"><?php echo $dados['nome_cliente']; ?></a></td>
                <td align="left"><?php echo $dados['telefone1']; ?></td>
                <td align="left"><?php echo $dados['endereco']; ?></td>
   		    </tr>
	   <?php } ?>
              </table><br />

                <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="left"><?php
			  if($pagina > 0){
				$menos = $pagina - 1;
				$url = "lista_clientes.php?pagina=$menos";
				echo "<a href='$url' style='text-decoration:none;color:#fff' ><<</a>";
			  }
			  ?></div></td>
            <td><div align="center" >
      <?php
			  for($i=0;$i<$paginas;$i++) { 
				$url = "lista_clientes.php?pagina=$i";
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
				$url = "lista_clientes.php?pagina=$mais";
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
