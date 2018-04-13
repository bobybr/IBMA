<div id='colunameio'>
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

<div style="margin:0; padding:0;" >
<img src="<?=$dadosconfig['url'];?>/img/protegido2.png" />
</div>

</div>
<div class="limpar"></div>

</div>
	