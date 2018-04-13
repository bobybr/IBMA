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

<?
echo "<script language='javascript' type='text/javascript'> 
if (top.location != self.location) {
    top.location.replace('".utf8_decode($dadosconfig['url'])."/?p=login4')
}
</script>
";
?>