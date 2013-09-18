<?php
session_start();
include "conexao.inc.php";
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
	<br />
      <br />
      <table width="600" border="0" align="center">
        <tr>
        <td colspan="2" align="right"><strong>Pedidos para hoje</strong></td>
        <td align="center">&nbsp;</td>
        <td colspan="2" align="center"><p><strong>Pedidos para amanhã</strong></p></td>
      </tr>
      <tr>
        <td width="96" align="right">Cliente 1</td>
        <td width="114" align="right">20 pastéis</td>
        <td width="22" align="right">&nbsp;</td>
        <td width="117" align="right">Cliente 1</td>
        <td width="129" align="right">10 pastéis</td>
      </tr>
      <tr>
        <td align="right">Cliente 2</td>
        <td align="right">15  pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">Cliente 2</td>
        <td align="right">25  pastéis</td>
        </tr>
      <tr>
        <td align="right">Cliente 3</td>
        <td align="right">10 pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">Cliente 3</td>
        <td align="right">20 pastéis</td>
        </tr>
      <tr>
        <td align="right">Cliente 4</td>
        <td align="right">50 pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">Cliente 4</td>
        <td align="right">40 pastéis</td>
        </tr>
      <tr>
        <td align="right">Cliente 5</td>
        <td align="right">30 pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">Cliente 5</td>
        <td align="right">30 pastéis</td>
        </tr>
      <tr>
        <td align="right">Cliente 6</td>
        <td align="right">45 pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">Cliente 6</td>
        <td align="right">45 pastéis</td>
        </tr>
      <tr>
        <td align="right">Cliente 7</td>
        <td align="right">30 pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        </tr>
      <tr>
        <td align="right">Cliente 8</td>
        <td align="right">10 pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        </tr>
      <tr>
        <td align="right">Cliente 9</td>
        <td align="right">25 pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        </tr>
      <tr>
        <td align="right">Cliente 10</td>
        <td align="right">35 pastéis</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        </tr>
      <tr>
        <td align="right">TOTAL</td>
        <td align="right">300</td>
        <td align="right">&nbsp;</td>
        <td align="right">TOTAL</td>
        <td align="right">170</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="right">Número máximo de pedidos: 300</td>
        <td align="right">&nbsp;</td>
        <td colspan="2" align="right">Número máximo de pedidos: </td>
        </tr>
  </table></td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
