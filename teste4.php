<?php 
include "conexao.inc.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<table cellSpacing=1 cellPadding=0 width="100%" align=center border=0>
<tr>
 <td>
 <?

 $sql = "SELECT * FROM produtos ORDER BY nome_produto ASC ";
 GeraColunas(4, $sql)
 ?>
 
 <?
function GeraColunas($pNumColunas, $pQuery) {
$resultado = mysql_query($pQuery);
echo ("<table width='100%' border='1'>\n");
 for($i = 0; $i <= mysql_num_rows($resultado); ++$i) {
 
 for ($intCont = 0; $intCont < $pNumColunas; $intCont++) {
  $linha = mysql_fetch_array($resultado);
  if ($i > $linha) {
   if ( $intCont < $pNumColunas-1) echo "</tr>\n";
   break;
  }
 
  $codigo = $linha[0];
  $texto = $linha[1];
 
  if ( $intCont == 0 ) echo "<tr>\n";
  echo "<td>". $texto ."</td>\n";
 
  if ( $intCont == $pNumColunas-1 ) {
   echo "</tr>\n";
  } else { $i++; }
 }
 
 }
echo ('</table>');
}
 
?>
 
 </td>
</tr>
</table>

</body>
</html>
