<?php require_once('external/conn.php'); 

$idG = $_GET['id'];

//GALERIA DE FOTOS
$sql = "Select * from secao_galeria_fotos WHERE id = '$idG' ";
$sql_res = mysql_query($sql, $conexao) or die ("Não foi possível executar a consulta.");

$row = mysql_fetch_array($sql_res);
$id = $row['id'];
$data = $row['data_hora'];
$titulo = $row['titulo'];
$texto = $row['texto'];
$status = $row['status'];


// PEGAR A URL DA PÁGINA
$protocolo    = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === false) ? 'http' : 'https';
$host         = $_SERVER['HTTP_HOST'];
$script       = $_SERVER['SCRIPT_NAME'];
$parametros   = $_SERVER['QUERY_STRING'];
$UrlAtual     = $protocolo . '://' . $host . $script . '?' . $parametros;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Amello Tenis</title>
<meta name="description" content="A A. Mello Tênis atua no esporte gaúcho há 18 anos buscando constantemente aperfeiçoar-se no atendimento e crescimento da prática esportiva. Nossa escola tem como campo de atuação ministrar aulas de tênis visando o ensino e a prática desta modalidade desde a infância até a idade adulta.">
<meta name="keywords" content="tênis, ball, bola, penn, head, nery, back, beck, babolar, adidas, wilson, raquete, rackete, quadra, aurélio, mello, melo, escola, saúde, competições, porto alegre, rs, brasil, jogador, profissional, amador, tenisgaucho, gaúcho, aabb, clube, campestre, aulas, babolat, atp, wta, fgt">
<link href="css/estilo_galeria.css" rel="stylesheet" type="text/css" />
<META property="og:image" content="http://www.amellotenis.com.br/tenis/imgs/amello_face.jpg" />
<META property="og:title" content="Notícias - <?php echo $titulo; ?>" />
<script language="JavaScript">
<!--
<!--hide this script from non-javascript-enabled browsers
function mailpage() {
mail_str = "mailto:?subject= " + document.title; mail_str += "&body= Eu recomendo o site da " + document.title; mail_str += ". Você pode conferir em www.aureliomello.com.br "; location.href = mail_str;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' deve ser válido.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' é necessário.\n'; }
  } if (errors) alert('Os seguintes erros ocorreram:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script src="prettyPhoto_uncompressed_3.1.4/js/jquery-1.6.1.min.js" type="text/javascript"></script>
		<!--script src="js/jquery.lint.js" type="text/javascript" charset="utf-8"></script-->
		<link rel="stylesheet" href="prettyPhoto_uncompressed_3.1.4/css/prettyPhoto.css" type="text/css" media="screen"  charset="utf-8" />
		<script src="prettyPhoto_uncompressed_3.1.4/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 

</head>

<body>

<center>
<?php include('topo.php')?>
<table width="996" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-left:20px" class="conteudo">
  <tr>
    <td width="996" colspan="2" align="left" ><h2 style="padding-left:20px">Galeria de fotos</h2>
	    
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left"></td>
        </tr>
        <tr>
          <td align="left"><table width="100%" height="238" border="0" cellpadding="0" cellspacing="10">
            <tr>
              <td ></td>
              <td width="33%" align="center" valign="top">
              
              

              
              
              
              </td>
              <td width="65%" align="center" valign="top" background="imagens/back_verde_claro.gif"></td>
            </tr>
            <tr>
              <td height="41" ></td>
              <td align="left" valign="top"><strong><?php echo htmlentities($titulo); ?></strong><br /><br />
</td>
              <td align="center" valign="top" background="imagens/back_verde_claro.gif"></td>
            </tr>
            <tr>
              <td ></td>
              <td align="left" valign="top" style="padding-left:20px"><?php if(file_exists("galeria_fotos/".$idG."/principal.jpg")){?>
              <img src="galeria_fotos/<?php echo $idG;?>/principal.jpg" /> <?php }?></td>
              <td valign="top" align="justify"><p><?php echo $texto; ?></p>
           

              
              </td>
            </tr>
            <tr>
              <td width="2%" ></td>
              <td colspan="2" align="left" valign="top" >    <ul class="gallery clearfix">
           
           
           </ul>
              <center><table border="0" align="center" cellpadding="0" cellspacing="5" class="gallery clearfix">
<?php
	
	$colunasF = 7;
	
	//FOTOS
	$sqlFotos = "SELECT * FROM fotos_galerias WHERE id_galeria = '$idG' ORDER BY id ASC";
	$resFotos = mysql_query($sqlFotos) or die ($sqlFotos."<br><br>".mysql_error());
	$qtdFotos = mysql_num_rows($resFotos);
		
	$iF = 0;
	while($rowFotos = mysql_fetch_array($resFotos)){
		$idFoto = $rowFotos['id'];
		$leg = $rowFotos['legenda'];
		
		if($iF == 0){ echo '<tr>'; }
		$iF++;
		
		echo '
			<td valign="top" align="center" style="padding:10px;">
				<a href="galeria_fotos/'.$idG.'/'.$idFoto.'.jpg" title="'.$leg.'" rel="prettyPhoto[gallery2]" target="_blank">
					<img src="galeria_fotos/'.$idG.'/'.$idFoto.'p.jpg" width="100" >
				</a>
			</td>
		';
		if($iF == $colunasF){
			echo '</tr>';
			$iF = 0;
		}
	}

?>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:4000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:4000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
</table></center></td>
              </tr>
          </table></td>
        </tr>
		</table>
        <tr>
          <td>&nbsp;</td>
        </tr>
		
        <tr>
          <td></td>
        </tr>
      </table>
	 
	  </td>
    </tr>
  
</table>

<?php include("rodape.php")?>
</center>
</body>
</html>