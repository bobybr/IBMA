<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 
	
	
setcookie("logado");
// aqui voc� coloca a p�gina para onde o usuario ir� depois
// de deslogar, geralmente a p�gina inicial do site.
header("Location:login.php");
?>