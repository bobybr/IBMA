<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 
	
# Configura��es
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1");

// inicializa a sess�o
session_start();
// limpa a sess�o
$_SESSION = array(); // colocando a session com um array vazio faz com ela
					 // fique vazia sem nenhuma variavel nela, liberando o espa�o
					 
// destroy a sess�o
session_destroy();

// redireciona o link para a home page a pagina principal
echo "
<script language='javascript' type='text/javascript'> 
if (top.location != self.location) {
    top.location.replace('".utf8_decode($dadosconfig['url'])."')
}
</script>
";
?>