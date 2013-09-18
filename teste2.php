//PEDIDOS DET
<?php

require_once('includes/conn.php');
require_once('includes/verifica_session.php');


$id = $_GET['id'];

//PEDIDO
$sql = "SELECT * FROM pedidos INNER JOIN cadastro ON pedidos.ped_cadID = cadastro.cad_id WHERE pedidos.ped_id = '$id'";
$sql_res = mysql_query($sql) or die ('ERRO: pesquisar pedido');
$row = mysql_fetch_array($sql_res);
$pedVenID = $row['ped_venID'];
$pedValor = $row['ped_valor'];
$pedFrete = $row['ped_frete'];
$pedForma = $row['ped_forma'];
$pedEntrega = $row['ped_entrega'];
$pedObs = $row['ped_obs'];

/*FORMATA VALOR
$pedValor = str_replace(".","",$pedValor);
$pedValor = str_replace(",","",$pedValor);
$nc = strlen($pedValor);
$nci = 0;
$ncf = $nc - 2;
$antes = substr($pedValor, $nci, $ncf);
$depois = substr($pedValor, $ncf, 2);
$pedValor = $antes .".". $depois;
*/

$razao = $row['cad_razao'];
$fantasia = $row['cad_fantasia'];
$email = $row['cad_email'];
$cep = $row['cad_cep'];
$endereco = $row['cad_endereco'];
$complemento = $row['cad_complemento'];
$bairro = $row['cad_bairro'];
$cidade = $row['cad_cidade'];
$uf = $row['cad_uf'];
$pais = $row['cad_pais'];
$ddd1 = $row['cad_ddd1'];
$fone = $row['cad_fone'];
$ddd2 = $row['cad_ddd2'];
$celular = $row['cad_celular'];
$ddd3 = $row['cad_ddd3'];
$comercial = $row['cad_fone_com'];
$cnpj = $row['cad_cnpj'];
$insc = $row['cad_insc_estadual'];
$comprador1 = $row['cad_comprador1'];
$cpf1 = $row['cad_cpf1'];
$nasc1 = $row['cad_nasc1'];
$sexo1 = $row['cad_sexo1'];
$comprador2 = $row['cad_comprador2'];
$cpf2 = $row['cad_cpf2'];
$nasc2 = $row['cad_nasc2'];
$sexo2 = $row['cad_sexo2'];

//DETALHES DO PEDIDO
$sqlP = "SELECT * FROM pedidos_det 
			INNER JOIN produtos 
				ON pedidos_det.ped_prodID = produtos.prod_id 
			WHERE pedidos_det.ped_pedID = '$id'";
$sqlP_res = mysql_query($sqlP) or die ('ERRO: pesquisar detalhes do pedido');

//BOLETOS
$sqlB = "SELECT * FROM pedidos_pagamento_boletos
			WHERE bol_pedID = '$id'";
$sqlB_res = mysql_query($sqlB) or die ('ERRO: pesquisar boletos');
?>
<html>
<head>
<title>Sistema Online de Gest&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<style type="text/css">
<!--
.style3 {font-size: 12; font-weight: bold; }
.style8 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>
<link href="includes/dukao.css" rel="stylesheet" type="text/css">

<body bgcolor="#3B5EA7" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" cellpadding="5" bgcolor="#FFFFFF">
  <tr> 
    <td width="19%" height="320" valign="top"> 
       <?php require_once('includes/menu_admin.php'); ?>
    </td>
    <td width="81%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="imgs/cadastros.gif" width="50" height="42" hspace="5" vspace="5" align="absmiddle"><font color="3B5EA7" size="4" face="Arial">Pedido</font></font></strong></td>
          <td><div align="right"><a href="javascript:history.back();"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="imgs/voltar.gif" width="69" height="24" hspace="10" border="0"></font></a></div></td>
        </tr>
      </table>
      <font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; </font>
      
	  <table width="100%">
        <tr>
          <td height="34" colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Imprimir pedido:</strong> <a href="#" onClick="MM_openBrWindow('pedido_print.php?id=<?php echo $id; ?>','','menubar=yes,scrollbars=yes,width=600,height=600')"><strong>Simples</strong></a> | <a href="#" onClick="MM_openBrWindow('pedido_print_completo.php?id=<?php echo $id; ?>','','menubar=yes,scrollbars=yes,width=600,height=600')"><strong>Completo</strong></a></font></td>
        </tr>
        
        <tr>
          <td height="25" colspan="2"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Comprador:</font></strong></td>
        </tr>
        <tr>
          <td height="25" colspan="2" valign="top"><table width="100%">
            <tr>
              <td width="16%" height="25"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Raz&atilde;o Social:</font></td>
              <td width="84%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $razao; ?></font></td>
            </tr>
            <tr>
              <td height="25"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome Fantasia:</font></td>
              <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $fantasia; ?></font></td>
            </tr>
            <form name="form1" method="post" action="funcoes/atualizar.php">
              <?php if(!empty($comprador2)){ ?>

              <?php } ?>
            </form>
            <form name="form2" method="post" action="cadastro_det.php" onSubmit="return confirma();">
            </form>
          </table></td>
        </tr>
        <tr> 
          <td height="25" colspan="2"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Detalhes 
            do Pedido:</font></strong></td>
        </tr>
        <tr> 
          <td height="25" colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr> 
                <td width="56%" bgcolor="#f6f6f6"><span class="style3">Produto</span></td>
                <td width="14%" bgcolor="#f6f6f6"><div align="center"><span class="style3">Quantidade</span></div></td>
                <td width="16%" bgcolor="#f6f6f6"><div align="center"><span class="style3">Valor 
                    Unit&aacute;rio<br>
                    (R$) </span></div></td>
                <td width="14%" bgcolor="#f6f6f6"><div align="center"><span class="style3">Valor 
                    Total <br>
                    (R$) </span></div></td>
              </tr>
              <?php
			while($rowP = mysql_fetch_array($sqlP_res)){
				$prodCOD = $rowP['prod_cod'];
				$prodNome = $rowP['prod_nome'];
				$pedQTD = $rowP['ped_qtd'];
				$prodValor = $rowP['ped_valor'];
				$prodCor = $rowP['ped_cor'];
				$prodEstampa = $rowP['ped_estampa'];
				$prodValorTotal = $pedQTD*$prodValor;
			?>
              <tr> 
                <td><span class="style8"><a href="../produtos/<?php echo $prodCOD; ?>.jpg" target="_blank"><?php echo $prodNome; ?> 
                  - <?php echo $prodCOD; ?>
				  <?php if(!empty($prodCor)){ echo "(COR: ".$prodCor.")"; } ?>
				  <?php if(!empty($prodEstampa)){ echo "(ESTAMPA: ".$prodEstampa.")"; } ?>
				  </a> 
				  </span></td>
                <td><div align="center" class="style8"><?php echo $pedQTD; ?></div></td>
                <td><div align="center" class="style8"><?php echo number_format($prodValor,2,",","."); ?></div></td>
                <td><div align="center" class="style8"><?php echo number_format($prodValorTotal,2,",","."); ?></div></td>
              </tr>
              <tr> 
                <td colspan="4"><hr size="1" noshade="noshade"></td>
              </tr>
              <?php } ?>
            </table></td>
        </tr>
        <tr> 
          <td width="74%" rowspan="3" valign="top"> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Forma de Pagamento: </strong>
		  <?php if($pedVenID == 0){ ?>
		  <?php echo strtoupper($pedForma); ?>
		  <?php 
		  } else { 
			  $sqlPG = "SELECT * FROM pedidos_pagamento
			  				INNER JOIN pagamento_tipos ON pedidos_pagamento.ped_pagID = pagamento_tipos.pag_id
						WHERE pedidos_pagamento.ped_pedID = '$id'";
			  $sqlPG_res = mysql_query($sqlPG) or die ('ERRO: pesquisar pagamento.');
			  $rowPG = mysql_fetch_array($sqlPG_res);
			  $pg_tipo = $rowPG['ped_pagID'];
			  $cheque1 = $rowPG['ped_cheque1'];
			  $cheque2 = $rowPG['ped_cheque2'];
			  $cheque3 = $rowPG['ped_cheque3'];
			  $cheque4 = $rowPG['ped_cheque4'];
			  $cheque5 = $rowPG['ped_cheque5'];
			  $dias1 = $rowPG['ped_dias1'];
			  $dias2 = $rowPG['ped_dias2'];
			  $dias3 = $rowPG['ped_dias3'];
			  $dias4 = $rowPG['ped_dias4'];
			  $dias5 = $rowPG['ped_dias5'];
			  $boletos = $rowPG['ped_boletos'];
			  $prazos = $rowPG['ped_prazos'];
			  $pagamento = $rowPG['pag_nome'];
			  
			  echo $pagamento;
			  
			  if($pg_tipo == 2){
			  	echo "<br><b>Cheque 1:</b> ".$cheque1." - <b>Prazo: </b>".$dias1." dias<br>";
				echo "<br><b>Cheque 2:</b> ".$cheque2." - <b>Prazo: </b>".$dias2." dias<br>";
				echo "<br><b>Cheque 3:</b> ".$cheque3." - <b>Prazo: </b>".$dias3." dias<br>";
				echo "<br><b>Cheque 4:</b> ".$cheque4." - <b>Prazo: </b>".$dias4." dias<br>";
				echo "<br><b>Cheque 5:</b> ".$cheque5." - <b>Prazo: </b>".$dias5." dias<br>";
			  }
			  
			  if($pg_tipo == 3){
			  	echo "<table width='60%' border='0'><tr>";
				echo "<td><b>VALOR DA PARCELA</b></td>";
				echo "<td><b>DATA FIXA</b></td>";
				echo "<td><b>PRAZO</td></b></tr>";
				while($rowB = mysql_fetch_array($sqlB_res)){
					$bol_parcela = $rowB['bol_parcela'];
					$bol_valor = $rowB['bol_valor'];
					$bol_data = $rowB['bol_data'];
					$bol_prazo = $rowB['bol_prazo'];
		
					list($ano,$mes,$dia) = split("-",$bol_data);
					$bol_data = $dia.".".$mes.".".$ano;
				
					echo "<tr><td>".$bol_parcela." - R$ ".number_format($bol_valor,2,",",".")."</td>";
					
					if($bol_data <> ".."){ echo "<td>".$bol_data."</td>"; }
					
					if(!empty($bol_prazo)){ echo "<td>".$bol_prazo." dias</td>"; } 
					
					echo "</tr>";
			 	}
				echo "</tr></table>";
			}
		  }
		  ?>
          </font></div></td>
          <td width="26%" height="25" bgcolor="#f6f6f6"><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Subtotal: 
              </font></strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">R$ 
              <?php echo number_format($pedValor,2,",","."); ?></font></div></td>
        </tr>
        <tr> 
          <td height="25" bgcolor="#f6f6f6"><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Frete: 
              </font></strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">R$ 
              <?php echo number_format($pedFrete,2,",","."); ?></font></div></td>
        </tr>
        <tr> 
          <td height="25" bgcolor="#f6f6f6"><div align="right"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Valor 
              total: </font></strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">R$ 
              <?php echo number_format($pedValor+$pedFrete,2,",","."); ?></font></div></td>
        </tr>
        <?php if($pedForma == "cartao"){ ?>
        <tr> 
          <td height="25" colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nome 
            no cart&atilde;o:</strong> </font><?php echo $cartaoNome; ?></td>
        </tr>
        <tr> 
          <td height="25" colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>N&uacute;mero 
            do cart&atilde;o:</strong> <?php echo $cartaoNumero; ?></font></td>
        </tr>
        <tr> 
          <td height="25" colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Data 
            de validade:</strong> <?php echo $cartaoValidade; ?></font></td>
        </tr>
        <tr> 
          <td height="25" colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Parcelas:</strong> 
            <?php echo $cartaoParcela; ?></font></td>
        </tr>
        <?php } ?>
        <form action="funcoes/atualizar.php" method="post">
          <tr>
            <td height="25" colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td height="25" colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Dados 
              de entrega:</strong></font></td>
          </tr>
          <tr> 
            <td height="25" colspan="2" bgcolor="#f6f6f6"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo nl2br($pedEntrega); ?></font></td>
          </tr>
          <tr>
            <td height="25" colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Observa&ccedil;&otilde;es do Pedido :</strong></font></td>
          </tr>
          <tr>
            <td height="25" colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo nl2br($pedObs); ?></font></td>
          </tr>
          <tr>
            <td height="25" colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td height="25" colspan="2"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Status: 
              <label> 
              <select name="status" id="status">
                <option value="N" <?php if ($status == 'N') { echo "selected"; } ?>>Pendente</option>
                <option value="S" <?php if ($status == 'S') { echo "selected"; } ?>>Aprovada</option>
              </select>
              </label>
              </font></strong></td>
          </tr>
          <tr> 
            <td height="25" colspan="2"><label> 
              <input name="origem" type="hidden" value="pedido">
              <input name="id" type="hidden" value="<?php echo $id; ?>">
              <input type="submit" name="Submit" value="Salvar">
              </label></td>
          </tr>
        </form>
      </table>
   </td>
  </tr>
</table>
<?php require_once('rodape.php'); ?>
</body>
</html>