<?
	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 
	
# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1")
?>
<style><? include ("../css/css".$dadosconfig['corsite'].".css"); ?></style><div id="tamanho">
<style>body {background:none!important;}</style>

<div style="margin:0; padding:0;" class='colunad1'>
	<form method="post"  action="logar2.php">
	<h2><a href='#'>Acessar painel de membros</a></h2>
	  
      <span style="width:130px; float:left; margin:20px 15px 10px 10px; color:#222; text-shadow: 1px 1px 1px #fff;">login: 
      <input class="formgeral" id="textborda" name="login" value="" title="Login"  type="text">
		</span>
      
        <span style="width:130px; float:left; margin:20px 0 10px 10px; color:#222; text-shadow: 1px 1px 1px #fff;">senha: 
        <input class="formgeral" id="textborda" name="senha" value="" title="Senha"  type="password"> 
		</span>
		<div class="limpar"></div>
		<span style="width:130px; margin:20px 0 0 10px; color:#222; text-shadow: 1px 1px 1px #fff;">
        <input type="submit" id="submit" value="entrar">
		</span>
		<br><br>
	</form>
</div>

</div>
<div class="limpar"></div>
	