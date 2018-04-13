<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 
	
	
setcookie("logado");
// aqui você coloca a página para onde o usuario irá depois
// de deslogar, geralmente a página inicial do site.
header("Location:login.php");
?>