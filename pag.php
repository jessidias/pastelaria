<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("includes/conn.php");

$pagina = $_GET['pagina'];

$sqlN = "SELECT * from noticias ORDER BY n_data DESC";
$sql_resN = mysql_query($sqlN, $conexao) or die ("ERRO CONSULTA.");

$qtd = mysql_num_rows($sql_resN);
$lpp = 10;
$paginas = ceil($qtd / $lpp);

if(!isset($pagina)) { $pagina = 0; }
$inicio = $pagina * $lpp;

$sqlN = "SELECT * from noticias ORDER BY n_data DESC LIMIT $inicio, $lpp";
$sql_resN = mysql_query($sqlN, $conexao) or die ("ERRO CONSULTA.");


?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Escola da Magistratura Federal do RS Cursos Juízes Direito Tributário Previdenciário Processual Civil Comercial Prática Previdenciária Benefícios por Incapacidade Ações Cíveis Federais</title>
<meta name="RATING" content="general" />
<meta name="expires" content="0" />
<meta name="distribution" content="Global" />
<meta name="copyright" content="Imóveis Porto Alegre Comprar Apartamento" />
<meta name="REVISIT-AFTER" content="3 days" />
<meta name="LANGUAGE" content="pt-br" />
<meta name="ROBOTS" content="index, follow" />
<meta name="GOOGLEBOT" content="index, follow" />
<meta name="AUDIENCE" content="all" />
<meta name="AUTHOR" content="Ponto Online Marketing Digital" />

<link rel="stylesheet" href="css/geral_internas2.css" type="text/css" media="screen" />

</head>

<body>
<?php include("topo.php");?>
<?php include("menu.php");?>
<center>
<table width="996" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="655" valign="top">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top"><a href="cursos_preparatorios.php"><img src="imgs/bt_cursos_preparatorios.png" width="210" height="48" alt="Cursos Preparatórios para Concursos" /></a></td>
        <td align="center" valign="top"><a href="cursos_atualizacao.php"><img src="imgs/bt_cursos_atualizacao.png" width="214" height="48" alt="Cursos de Atualização do Direito" /></a></td>
        <td align="center" valign="top"><a href="cursos_especializacao.php"><img src="imgs/bt_cursos_especializacao.png" width="231" height="48" alt="Cursos de Especialização em Direito" /></a></td>
      </tr>
    </table></td>
    <td width="329" valign="top" ><table width="100%">
      <tr>
        <td height="34" align="center" valign="middle"><a href="esmafe_virtual.php"><img src="imgs/menu_esmafe_virtual2.jpg" alt="Esmafe Virtual Cursos à Distância" width="329" height="40" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="300" colspan="2" valign="top"><table width="100%" cellpadding="10">
      <tr>
        <td height="300" valign="top" bgcolor="#FFFFFF">
        <center>
        <table width="90%" align="center">
          <tr>
            <td height="45" align="left"><img src="imgs/titulos/noticias.png" width="250" height="22" /></td>
            </tr>
			<?php
		  while($row = mysql_fetch_array($sql_resN)){
		    $n_id = $row['n_id'];
		  	$n_titulo = $row['n_titulo'];
			$n_desc = $row['n_desc'];
			$data2 = $row['n_data'];
			list($anoN,$mesN,$diaN) = split("-",$data2);
			$data2 = $diaN."/".$mesN."/".$anoN;
		  ?>
          <tr>
            <td align="left" valign="top"><font size=3 face=calibri color="#999999">
            <strong><a href="noticias_det.php?id=<?php echo $n_id; ?>"><img src="imgs/marcador_mais.png" width="18" height="21" align="top" /> <?php echo mb_convert_encoding($row['n_titulo'], "UTF-8", "HTML-ENTITIES"); ?></a></strong></font></td>
            </tr>
			<tr>
			  <td align="left" valign="top">Incluída em: <?php echo $data2; ?></td>
			  </tr>
			<tr>
			
			<td style="height:2px">&nbsp;</td>
			</tr>
			  <?php } ?>
        </table>
       
        <br />
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><?
			  if($pagina > 0){
				$menos = $pagina - 1;
				$url = "noticias.php?pagina=$menos";
				echo "<a href='$url'><<</a>"; // Vai para a p&aacute;gina anterior
			  }
			  ?></td>
            <td><div align="center">
      <?php
			  for($i=0;$i<$paginas;$i++) { // Gera um loop com o link para as p&aacute;ginas
				$url = "noticias.php?pagina=$i";
				$numpag = $i + 1;
				if ($pagina+1 == $numpag){
					echo "        <b><a class='menuInterno' href='$url'>$numpag</a></b>";
				}	else {
						echo "        <a href='$url'>$numpag</a>";
					}
			  }
			  ?>
    </div></td>
            <td><div align="right">
      <?php
			  if($pagina < $paginas-1){
				$mais = $pagina + 1;
				$url = "noticias.php?pagina=$mais";
				echo "<a href='$url'>>></a>";
			  }
			  ?>
    </div></td>
          </tr>
        </table>
        </center>
        </td>
        </tr>
    </table></td>
    </tr>
</table>
<?php include("rodape2.php"); ?>
</center>
</body>
</html>