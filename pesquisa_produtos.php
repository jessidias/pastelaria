<?php
include "conexao.inc.php";
session_start();



// Restrição para apenas receber 
	// valores pelo formulário
	if(isset($_POST["acao"])) {

$busca = $_POST['palavra'];// palavra que o usuario digitou
$categoria = $_POST['categoria']; //categoria que o usuario deseja
			

$con = mysql_connect("localhost", "test", "") or
   die('Não foi possível conectar');

mysql_select_db("test", $con);


if ($categoria == 'nome'){
$busca_query = mysql_query("SELECT * FROM produtos WHERE nome_produto LIKE '%$busca%'");
}

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
    <div style="padding-left:250px;padding-top:10px"> 
     <!--<form action="pesquisa_produtos.php" method="post">
      Buscar produtos:
      <input name="palavra" type="text" value="Digite aqui para pesquisar..." size="45" />
     
    
      <select name="categoria">
			<option value="nome">Nome</option>
			
		</select>
        <input type="submit" name="acao" value="Ok"/>
      </form>-->
       <h2> Resultados da pesquisa por "<?php echo $busca; ?>"</h2>
</div> <br />
<br />

<table width="500"  border="0" align="center">
  <tr >
  <div style="padding-left:250px; padding-right:300px">
   <?php
    while ($dados = mysql_fetch_array($busca_query)) {
    echo "Nome: $dados[nome_produto]<br />";
	echo "Valor unitário: $dados[valor_unitario]<br />";
	
    echo "<hr>";
}
			
} else {

	echo "Acesso negado";

}?>
</div>
  </tr>
  </table>

</td>
  </tr>
</table>

          </div> 
                
				<div id="rodape"><?php include("rodape.php");?></div>
				
			</div>
</body>
</html>
