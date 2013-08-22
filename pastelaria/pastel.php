<?php
include "conexao.inc.php";
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<?php $select = mysql_query("SELECT * FROM produtos");?>
  
    
<form action="cadastra_pedido2.php" method="post">
  <table width="330" border="0">
    <?php while ($rows = mysql_fetch_array($select)){
		$id_produto = $rows['id_produto'];
		$nome_produto = $rows['nome_produto'];
?>
     
    <tr>
      
      <td width="154"><input type="checkbox" name="pastel" value="<?php echo $id_produto; ?>"/>
          <?php echo $rows['nome_produto']; ?></td>
          
        <td width="166" align="right">Quantidade: 
          <input name="qtd" type="text" id="qtd" size="5" /></td>
    </tr>
    <?php } ?>
  </table>
    <input type="submit" name="acao" value="Enviar" />
  </form>
 
</body>
</html>
