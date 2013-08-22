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
    <td><div style="padding-left:250px;padding-top:10px">Buscar: 
      <label for="textfield"></label>
      <input name="textfield" type="text" id="textfield" value="Digite aqui para pesquisar..." size="50" />
     
    
      <select name="categoria">
			<option value="livro">Nome</option>
			<option value="autor">CPF</option>
			<option value="genero">CNPJ</option>
		</select>
      
</div>
      <br />
      <br />
<table width="600" border="1" align="center">
  <tr>
    <td colspan="5" align="center"><h2>Últimas Vendas | Ver lista de Vendas</h2></td>
  </tr>
  <tr>
    <td width="139" align="left">Cliente</td>
    <td width="117" align="left">Data do Pedido</td>
    <td width="95" align="left">Valor Total</td>
    <td width="103" align="left">Valor Pago</td>
    <td width="124" align="left">Ver mais detalhes</td>
  </tr>
  <tr>
    <td align="left">João da Silva Dias</td>
    <td align="left">30/04/2013</td>
    <td align="left">R$ 20,00</td>
    <td align="left"><input type="text" size="4" /></td>
    <td align="center">(+)</td>
  </tr>
  <tr>
    <td align="left">Simone Ramos</td>
    <td align="left">02/05/2013</td>
    <td align="left">R$ 5,00</td>
    <td align="left"><input type="text" size="4" /></td>
    <td align="center">(+)</td>
  </tr>
  <tr>
    <td align="left">Banca 33</td>
    <td align="left">02/05/2013</td>
    <td align="left">R$ 7,00</td>
    <td align="left"><input type="text" size="4" /></td>
    <td align="center">(+)</td>
  </tr>
  <tr>
    <td align="left">Bar Zucco</td>
    <td align="left">02/05/2013</td>
    <td align="left">R$ 12,00</td>
    <td align="left"><input type="text" size="4" /></td>
    <td align="center">(+)</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="center"><input type="submit" name="button" id="button" value="Atualizar" /></td>
    <td align="center"><input type="submit" name="button2" id="button2" value="Limpar" /></td>
  </tr>
</table>
<br /></td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
