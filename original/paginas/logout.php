<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 
	
# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1");

// inicializa a sessão
session_start();
// limpa a sessão
$_SESSION = array(); // colocando a session com um array vazio faz com ela
					 // fique vazia sem nenhuma variavel nela, liberando o espaço
					 
// destroy a sessão
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