<?php
error_reporting(E_ERROR | E_PARSE);
include "conexao.inc.php";
session_start();

$valor_total = '0,00';
$data_pedido=date("d/m/Y");
$data_entrega=date('d/m/Y', strtotime("+1 day"));

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
     <form action="pesquisa_pedidos.php" method="post">
      Buscar pedidos:
      <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
     
    
      <select name="categoria">
			<option value="nome">Nome</option>
			<option value="cpf">CPF</option>
			<option value="cnpj">CNPJ</option>
		</select>
        <input type="submit" name="acao2" value="Ok"/>
      </form>
</div> <br />
<form action="cadastra_pedido.php" method="post">
  <table width="700"  border="0" align="center">
  <tr>
    <td colspan="2" align="center"><h2><a href="pedidos.php"  style="text-decoration:none;color:#FFF">Cadastrar Pedido</a> | <a href="lista_pedidos.php" style="text-decoration:none;color:#FFF">Ver Lista de Pedidos</a></h2></td>
    </tr>
  <tr>
    <td height="30" colspan="2" align="center">
	<?php if($_GET['msg']=="0"){ echo "<font color='#FFFFFF'>Pedido realizado com sucesso.</font>";} ?>
     </td>
    </tr>
  <tr>
    <td width="161">Cliente:</td>
    <td width="335">
      <select name="id_cliente">
              <option value="0">Selecione um cliente</option>
             
              <?php
		$query = mysql_query("SELECT * from clientes");
		while($dados = mysql_fetch_array($query)) {
		$id_cliente = $dados['id_cliente'];
        $nome_cliente = $dados['nome_cliente'];
		?>
		<option value="<?php echo $id_cliente;?>"><?php echo $dados['nome_cliente']; ?></option>
              <?php  } ?>
              
            </select></td>
    </tr>
    
<!--<form method="post" action="">-->
  <tr>
   <?php $select = mysql_query("SELECT * FROM produtos");?>
    <td valign="top">Produtos:</td>
    
    <td>

    <table width="100%" border="0">
     <?php while ($row = mysql_fetch_array($select)){
		$id_produto = $row['id_produto'];
		$nome_produto = $row['nome_produto'];
		$valor_unitario = $row['valor_unitario'];
		//$valor_total = $valor_unitario;
		 ?>
     
      <tr>
      
        <td width="168"><input type="checkbox" name="id_produto[]" value="<?php echo $id_produto; ?>"/>
          <?php echo $nome_produto; ?></td>
        <td width="159" align="right">Quantidade: 
          <input name="quantidade[<?php echo $id_produto; ?>]" type="text" size="2" />
         
          </td>
          <td width="173">Valor Unitário:
            <input name="valor_unitario[]" id="valor_unitario[]" type="text" size="4" value="<?php echo $valor_unitario; ?>" /></td>
          
      </tr>
    <?php } ?>
    </table> 
    
      </td>
    </tr>
   
    <tr>
      <td>Valor total:</td>
      <td><input type="text" name="valor_total" id="valor_total" <?php /*?>value="<?php echo $valor_total; ?>"<?php */?> />  
      <input type="submit" name="acao2" value="Calcular total" /></td>
    </tr>
   <!-- </form>-->
  <tr>
    <td>Data do pedido:</td>
    <td><input name="data_pedido" type="text" id="data_pedido" value="<?php echo $data_pedido;?>" /></td>
    </tr>
  <tr>
    <td>Data da entrega:</td>
    <td><input name="data_entrega" type="text" id="data_entrega" value="<?php echo $data_entrega;?>" /></td>
    </tr>
  <tr>
    <td align="left">Observações do pedido:</td>
    <td><label for="obs"></label>
      <textarea name="obs" id="obs" cols="39" rows="5"></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="acao" value="Enviar" />      <input type="reset" value="Limpar" /></td>
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
