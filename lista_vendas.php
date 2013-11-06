<?php
include "conexao.inc.php";
error_reporting(E_ERROR | E_PARSE);
session_start();

$pagina = $_GET['pagina'];

$sqlN = "SELECT a.nome_cliente, b.id_cliente, b.data_pedido, b.valor_total, b.valor_pago, b.id_pedidos FROM clientes AS a INNER JOIN pedidos AS b ON b.id_cliente=a.id_cliente and b.valor_pago!='' ORDER BY id_pedidos DESC";
$sql_resN = mysql_query($sqlN) or die ("ERRO CONSULTA.");

$qtd = mysql_num_rows($sql_resN);
$lpp = 6;
$paginas = ceil($qtd / $lpp);

if(!isset($pagina)) { $pagina = 0; }
$inicio = $pagina * $lpp;

$sqlN = "SELECT a.nome_cliente, b.id_cliente, b.data_pedido, b.data_entrega, b.valor_total, b.valor_pago, b.id_pedidos FROM clientes AS a INNER JOIN pedidos AS b ON b.id_cliente=a.id_cliente and b.valor_pago!='' ORDER BY id_pedidos DESC LIMIT $inicio, $lpp";
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
    <td><div style="padding-left:250px;padding-top:10px"><form action="pesquisa_vendas.php" method="post">
      Buscar vendas:
            <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
      <select name="categoria">
        <option value="nome">Nome</option>
        <option value="cpf">CPF</option>
        <option value="cnpj">CNPJ</option>
      </select>
      <input type="submit" name="acao2" value="Ok"/>
    </form>
      
</div>
     
      <table width="800" border='0' align="center"  style="padding-left:50px;">
        <tr>
          <td colspan="8" align="center"><h2><a href="vendas.php" style="text-decoration:none;color:#FFF">Fechar Pedidos </a>| <a href="lista_vendas.php"  style="text-decoration:none;color:#FFF">Ver Lista de Vendas</a></h2></td>
        </tr>
        <tr>
          <td colspan="7" align="left">
          <center>
         <?php if($_GET['msg']=="1"){ echo "<font color='#CC0000'>Venda excluída com sucesso.</font>";} ?></center></td>
    </tr></td>
          </tr>
        <tr>
          <td align="left">Nº Venda</td>
          <td align="left">Cliente</td>
          <td align="left">Data do pedido</td>
          <td align="left">Data de entrega</td>
          <td align="left">Valor Total </td>
          <td align="left">Valor Pago</td>
          <td align="center">&nbsp;</td>
          
        </tr>
        <?php while($dados = mysql_fetch_array($sql_resN)) {?>
         
        <tr>
          <td><a href="editar_vendas.php?id_pedidos=<?php echo $dados['id_pedidos']; ?>" style="text-decoration:none;color:#FFF"><?php echo $dados['id_pedidos']; ?></a></td>
          <td><?php echo $dados['nome_cliente']; ?></td>
          <td><?php echo $dados['data_pedido']; ?></td>
          <td><?php echo $dados['data_entrega']; ?></td>
          <td>R$  <?php echo $dados['valor_total']; ?></td>
		  <td>R$  <?php echo $dados['valor_pago']; ?></td>
          <td align="center">
           <form method="post" action="excluir_vendas.php">
           <input name="id_pedidos" type="hidden" value="<?php echo $dados["id_pedidos"]; ?>" />
          <input name="acao" type="submit" value="Excluir Venda" />
          </form></td>
         
          </tr>
        <?php } ?>
       
      </table>
       <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="left"><?php
			  if($pagina > 0){
				$menos = $pagina - 1;
				$url = "lista_vendas.php?pagina=$menos";
				echo "<a href='$url' style='text-decoration:none;color:#fff' ><<</a>";
			  }
			  ?></div></td>
            <td><div align="center" >
      <?php
			  for($i=0;$i<$paginas;$i++) { 
				$url = "lista_vendas.php?pagina=$i";
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
				$url = "lista_vendas.php?pagina=$mais";
				echo "<a href='$url' style='text-decoration:none;color:#fff'>>></a>";
			  }
			  ?>
    </div></td>
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
