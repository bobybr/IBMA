<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 
	
	
if (!$logado) {
    // se o usuario nao for cadastrado volta para a
    // home
    header("Location:login.php");
}
?>

Você já está logado
<a href="?p=logoff">sair</a>