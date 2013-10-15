<?php
include "conexao.inc.php";
session_start();
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
      <table width="500" border="0">
        
        <tr><form method="post" action="rel_periodo.php">
          <td width="249">Visualizar relatório por período:</td>
          <td width="146"><input name="periodo1" type="text" id="periodo1" size="5" />
            a 
            <input name="periodo2" type="text" id="periodo2" size="5" /></td>
          <td width="91"><input type="submit" name="acao" value="Pesquisar" /></td>
           </form></tr>
         
        <tr><form method="post" action="rel_mensal.php">
          <td>Visualizar relatório mensal:</td>
          <td><select name="mensal">
            <option value="/01/">Janeiro</option>
            <option value="/02/">Fevereiro</option>
            <option value="/03/">Março</option>
            <option value="/04/">Abril</option>
            <option value="/05/">Maio</option>
            <option value="/06/">Junho</option>
            <option value="/07/">Julho</option>
            <option value="/08/">Agosto</option>
            <option value="/09/" selected="selected">Setembro</option>
            <option value="/10/">Outubro</option>
            <option value="/11/">Novembro</option>
            <option value="/12/">Dezembro</option>
          </select></td>
          <td><input type="submit" name="acao2" value="Pesquisar" /></td></form>
          </tr>
        <tr>
          <td>Visualizar relatório anual:</td>
          <form method="post" action="rel_anual.php"><td>
          <select name="ano">
            <option value="2013" selected="selected">2013</option>
            <option value="2012">2012</option>            
          </select>
          </td>
          <td><input type="submit" name="acao3" value="Pesquisar" /></td>
          </form>
          </tr>
      </table>
      <br />
      <strong>Você escolheu a opção &quot;Visualizar Relatório anual 2012&quot;</strong>
      
    </div>
      <br />
      <table width="500" border="0" align="center">
        <tr>
        <td align="left"><strong>Produtos mais vendidos</strong></td>
      </tr>
      <tr>
        <td align="left">Pastel de Carne</td>
      </tr>
      <tr>
        <td align="left">Pastel de Queijo</td>
      </tr>
      <tr>
        <td align="left">Pastel de Frango</td>
      </tr>
  </table>
      <br />
      <!--<table width="500" border="0" align="center">
        <tr>
          <td align="left"><strong> Mês com maior número de vendas</strong></td>
        </tr>
        <tr>
          <td align="left">Março</td>
        </tr>
        <tr>
          <td align="left">Abril</td>
        </tr>
        <tr>
          <td align="left">Agosto</td>
        </tr>
    </table>-->
      <br /></td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
