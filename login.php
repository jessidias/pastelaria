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
			
 			   
  				<div id="menuh" style="padding-bottom:20px"><?php include("topo2.php"); ?></div>
				
				
				
 				<div id="texto">
              
          <table width="998" border="0" >
  <tr>
    <td align="center">
<form action="form_login.php" method="post">
  <h1>LOGIN</h1>
Digite seu usuário e senha para acessar o sistema.<br />
<table width="300"  border="0" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="161">Usuário:</td>
    <td width="335" height="30">
      <input name="usuario" type="text" id="usuario" /></td>
    </tr>
  <tr>
    <td>Senha:</td>
    <td height="30"><input type="password" name="senha" id="senha" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="acao" id="acao" value="Login" style="font-size:16px" /> <input type="reset" name="acao" id="acao" value="Limpar" style="font-size:16px" /></td>
  </tr>

</table>
<br />
</form>
</td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
