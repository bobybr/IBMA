<style>body {background:none!important;}</style>
<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 

	# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1");

// revebe dados do formulario
$login = mysql_real_escape_string($_POST['login']);
$senha = mysql_real_escape_string($_POST['senha']);

// verifica se o usuario existe
$consulta = mysql_query("select * from user where login='$login'");
$campos = mysql_num_rows($consulta);
if($campos != 0) {
// se o usuario existi verifica a senha dele
	if($senha != mysql_result($consulta,0,"Senha")) {
		echo "<p style='color:red; margin:0 0 6px 0px; widht:100%; background:#FFE1E1; font-size:12px; padding:2px 10px; border:1px solid #ffc1c1; moz-border-radius: 5px; -webkit-border-radius: 5px;'>A senha que você forneceu está errada!</p>";
	include "login2.php";
		
	} else {
		// estiver tudo certo vamos ver se ele é o administrador
		if($login == $login_admin) {
			// se for o login do administrador vamos verificar a senha dele
			// se é igual a do administrado
			if($senha == $senha_admin) {
				// se for o administrador vomos criar a sessão
				session_start();
				$_SESSION['login_usuario'] = $login;
				$_SESSION['senha_usuario'] = $senha;
			
				// redireciona o link para uma outra pagina
				echo "<p style='color:red; margin:0 0 6px 0px; widht:100%; background:#FFE1E1; font-size:12px; padding:2px 10px; border:1px solid #ffc1c1; moz-border-radius: 5px; -webkit-border-radius: 5px;'>Erro: informe seu login e senha!</p>";
	include "login2.php";
				
			}
		} else {
			// se o login não for do administrado vamos criar a sessão dele
			session_start();
			$_SESSION['login_usuario'] = $login;
			$_SESSION['senha_usuario'] = $senha;
			
			// redireciona o link para uma outra pagina
			echo "
<script language='javascript' type='text/javascript'> 
if (top.location != self.location) {
    top.location.replace('".utf8_decode($dadosconfig['url'])."/membros')
}
</script>
";

		}
	}
} else {
	echo "<p style='color:red; margin:0 0 6px 0px; widht:100%; background:#FFE1E1; font-size:12px; padding:2px 10px; border:1px solid #ffc1c1; moz-border-radius: 5px; -webkit-border-radius: 5px;'>O login que você digitou não existe</p>";
	include "login2.php";
}
?>