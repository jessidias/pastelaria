<?php
include "conexao.inc.php";
 
$sqlN = "SELECT * from clientes";
$sql_resN = mysql_query($sqlN) or die ("ERRO CONSULTA."); 
 
$ver = mysql_fetch_array($sqlN);
?>

<?php
$html='
<html>
<style type="text/css">
hr {
border: 2px solid #39F;
}
.textos {
font-family: Verdana, Geneva, sans-serif;
font-size: 13px;
line-height: 18px;
color: #333;
}
td {
font-family: Verdana, Geneva, sans-serif;
font-size: 13px;
line-height: 18px;
color: #09F;
}
body {
font-family: Calibri;
}
#dados {
font-family: Calibri;
font-size: 16px;
}
h2 {
font-family: Calibri;
color: #09F;
}
</style>
<body>
';
 
$html.='<table width="657" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="384"><strong>Informações de Cliente/Empresa: </strong> '.$ver['nome_cliente'].'<br />
<td width="52" align="right"><img src="exemplo.jpg" width="230" height="70"></td>
</tr>
</table>
<hr />
<hr />
<p>Empresa tal bla bla bla - Todos os Direitos Reservados.<br>
Aplicações Especiais PHP - Alaerte Gabriel
</p>
</body>
</html>';
?>
<?php
 
//Aqui nós chamamos a class do dompdf
require_once('dompdf/dompdf_config.inc.php');
 
//É fundamental definir o TIMEZONE de nossa região para que não tenhamos problemas com a geração.
date_default_timezone_set('America/Sao_Paulo');
 
//Aqui eu estou decodificando o tipo de charset do documento, para evitar erros nos acentos das letras e etc.
$html = utf8_decode($html);
 
//Instanciamos a class do dompdf para o processo
$dompdf= new DOMPDF();
 
//Aqui nós damos um LOAD (carregamos) todos os nossos dados e formatações para geração do PDF
$dompdf->load_html($html);
 
//Aqui nós damos início ao processo de exportação (renderizar)
$dompdf->render();
 
//por final forçamos o download do documento, coloquei a nomenclatura com a data e mais um string no final.
$dompdf->stream(date('d/m/Y').'_cliente.pdf');
?>