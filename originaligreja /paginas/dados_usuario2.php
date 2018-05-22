<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 



include "../paginas/validar_session2.php";


// faz consulta no banco
$consulta = mysql_query("select * from user where login = '$login_usuario'");

$dados = db_dados("SELECT user.*,
z_simnao_categoria.*, DATE_FORMAT(data,'%d/%m/%Y') as data1, DATE_FORMAT(nascimento,'%d/%m/%Y') as nascimento1, DATE_FORMAT(datafe,'%d/%m/%Y') as datafe1, DATE_FORMAT(databatismo,'%d/%m/%Y') as databatismo1, DATE_FORMAT(dataentrou,'%d/%m/%Y') as dataentrou1 FROM user INNER JOIN
z_simnao_categoria ON (z_simnao_categoria.id_categoria = user.conjugecrente) WHERE login = '$login_usuario' LIMIT 1;");



?>

<?
# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1")
?>
<style><? include ("../css/css".$dadosconfig['corsite'].".css"); ?></style><div id="tamanho">

 
<div style="margin:0; padding:0;"  class='colunad1'>
	<h2><a href='#'>Olá <?=utf8_decode($dados['nome']);?>, o que deseja fazer?</a></h2>
	<span style="width:250px; float:left; margin:20px 15px 10px 10px; color:#222; text-shadow: 1px 1px 1px #fff;">
	<a href="membros2.php"><img src="../img/perfil.png" /> ver meu perfil</a><br>
	<a href="editar2.php"><img src="../img/editar.png" /> editar meus dados</a><br>
	<a href="logout.php"><img src="../img/sair.png" /> sair</a><br></span>
</div>
 

