﻿<table width="100%" border="0">
  <tr>
    <td colspan="6" align="right" style="font-size:20px;font-family:Verdana, Arial, Helvetica, sans-serif;"><?php 
	if(!isset($_SESSION["id"])) {?>
      <?php header("location: login.php"); ?>
          <?php } else{ echo "Olá, ".$_SESSION["nomecompleto"]."!"; }?><a href="logout.php" style="font-size:20px;font-family:Verdana, Arial, Helvetica, sans-serif;text-decoration:none;color:#000">(SAIR)</a>
       
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href="clientes.php"><img src="imgs/clientes.png" width="77" height="18"></a></td>
    <td align="center"><a href="produtos.php"><img src="imgs/produtos.png" width="87" height="18"></a></td>
    <td align="center"><span style="font-size:20px;font-family:Verdana, Arial, Helvetica, sans-serif;"><a href="planejamento.php"><img src="imgs/planejamento.png" width="132" height="22" /></a></span></td>
    <td align="center"><a href="pedidos.php"><img src="imgs/pedidos.png" width="77" height="18" /></a></td>
    <td align="center"><a href="vendas.php"><img src="imgs/vendas.png" width="70" height="18" /></a></td>
    <td align="center"><a href="relatorios.php"><img src="imgs/relatorios.png" width="97" height="18" /></a></td>
  </tr>
</table>

