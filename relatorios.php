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
      <table width="550" border="0">
        <tr>
          <td width="224">Visualizar relatório por período:</td>
          <td width="113">de
            <input name="textfield" type="text" id="textfield2" value="__/__/__" size="5" /></td>
          <td width="101">a
            <input name="textfield2" type="text" id="textfield" value="__/__/__" size="5" /></td>
          <td width="84"><input type="submit" name="button" id="button" value="Pesquisar" /></td>
          </tr>
        <tr>
          <td>Visualizar relatório mensal:</td>
          <td><select name="categoria2">
            <option value="semanal" selected="selected">Janeiro</option>
            <option value="mes">Fevereiro</option>
            <option value="lucro">Março</option>
             <option value="lucro">Abril</option>
              <option value="lucro">Maio</option>
               <option value="lucro">Junho</option>
                <option value="lucro">Julho</option>
                 <option value="lucro">Agosto</option>
                  <option value="lucro">Setembro</option>
                   <option value="lucro">Outubro</option>
                    <option value="lucro">Novembro</option>
                     <option value="lucro">Dezembro</option>
          </select></td>
          <td>&nbsp;</td>
          <td><input type="submit" name="button2" id="button2" value="Pesquisar" /></td>
          </tr>
        <tr>
          <td>Visualizar relatório anual:</td>
          <td><select name="categoria3">
            <option value="semanal" selected="selected">2013</option>
            <option value="mes">2012</option>

          </select></td>
          <td>&nbsp;</td>
          <td><input type="submit" name="button3" id="button3" value="Pesquisar" /></td>
          </tr>
      </table>
      <br />
      <strong>Você selecionou a opção Visualizar Relatório anual 2012.</strong>
      <label for="textfield2"></label>
          <label for="textfield"></label>
    </div><br />
      <br />
      <table width="500" border="0" align="center">
        <tr>
        <td align="left">PRODUTOS MAIS VENDIDOS</td>
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
      <table width="500" border="0" align="center">
        <tr>
          <td align="left"> MESES COM MAIOR NÚMERO DE VENDAS</td>
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
    </table>
      <br />
      <table width="500" border="0" align="center">
        <tr>
          <td align="left">LUCROS </td>
        </tr>
        <tr>
          <td align="left">Março: R$ 2.500</td>
        </tr>
        <tr>
          <td align="left">Abril: R$ 2.300</td>
        </tr>
        <tr>
          <td align="left">Agosto: R$ 2.100</td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
