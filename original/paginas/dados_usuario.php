<?php

	require_once ('../includes/BancoDeDados.php'); 
	require_once ('../includes/Funcoes.php'); 
	require_once ('../includes/Config.php'); 
	require_once ('../includes/Imagens.php'); 
	require_once ('../includes/Validacoes.php'); 



include "../paginas/validar_session.php";


// faz consulta no banco
$user = db_dados("select * from user where login = '$login_usuario'");
if ($user['flag_status']==0){echo '<p style="font-family:verdana; font-weight:bold; color:red; margin:0 auto; width:600px; text-align:center; font-size:12px;">Este usuário foi desativado! Entre em contato com o pastor.</p>'; }
else {

$dados = db_dados("SELECT user.*,
z_simnao_categoria.*, DATE_FORMAT(data,'%d/%m/%Y') as data1, DATE_FORMAT(nascimento,'%d/%m/%Y') as nascimento1, DATE_FORMAT(datafe,'%d/%m/%Y') as datafe1, DATE_FORMAT(databatismo,'%d/%m/%Y') as databatismo1, DATE_FORMAT(dataentrou,'%d/%m/%Y') as dataentrou1 FROM user INNER JOIN
z_simnao_categoria ON (z_simnao_categoria.id_categoria = user.conjugecrente) WHERE login = '$login_usuario' LIMIT 1;");

$dizimista1 = db_dados("SELECT user.*,
z_simnao_categoria.*, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM user INNER JOIN
z_simnao_categoria ON (z_simnao_categoria.id_categoria = user.dizimista) WHERE login = '$login_usuario' LIMIT 1;");

$cargo1 = db_dados("SELECT user.*,
z_cargos_categoria.*, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM user INNER JOIN
z_cargos_categoria ON (z_cargos_categoria.id_categoria = user.posicaoeclisiastica) WHERE login = '$login_usuario' LIMIT 1;");

$estadocivil1 = db_dados("SELECT user.*,
 z_estadocivil_categoria.*, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM user INNER JOIN
 z_estadocivil_categoria ON ( z_estadocivil_categoria.id_categoria = user.estadocivil) WHERE login = '$login_usuario' LIMIT 1;");

$grau1 = db_dados("SELECT user.*,
z_grau_categoria.*, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM user INNER JOIN
z_grau_categoria ON (z_grau_categoria.id_categoria = user.grau) WHERE login = '$login_usuario' LIMIT 1;");

$ministerio1 = db_dados("SELECT user.*,
z_ministerios_categoria.*, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM user INNER JOIN
z_ministerios_categoria ON (z_ministerios_categoria.id_categoria = user.ministerio) WHERE login = '$login_usuario' LIMIT 1;");

$gostariarabalhar1 = db_dados("SELECT user.*,
z_ministerios_categoria.*, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM user INNER JOIN
z_ministerios_categoria ON (z_ministerios_categoria.id_categoria = user.gostariatrabalhar) WHERE login = '$login_usuario' LIMIT 1;");


?>

<?
# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1")
?>
<style><? include ("../css/css".$dadosconfig['corsite'].".css"); ?></style><div id="tamanho">
<style>body {background:none!important;}</style>
<div id="tamanho">
<table>
 
<tr style=" font-size:14px;width:200px;"><th style=" font-size:14px; padding:5px 10px; width:200px; background:#fff; border:1px solid #ccc;"><img src="../arquivos/user/<?=utf8_decode($dados['imagem']);?>" width="200px"></th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b></b></td></tr>

<!-- dados pessoais -->
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#ccc; border-top:5px solid #fff;"><p style=" font-size:14px; color:#222; font-size:20px;">Dados Pessoais</p></th></tr>

<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Data do cadastro:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['data1']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Nome:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['nome']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Sobrenome:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['sobrenome']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Nome do Pai:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['pai']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Nome da M&atilde;e:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['mae']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Naturalidade:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['naturalde']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Nacionalidade:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['nacional']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Data de Nascimento:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['nascimento1']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Estado Civil:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($estadocivil1['categoria']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Nome do Conjuge:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['conjuge']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Conjuge &eacute; crente?:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['categoria']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Conjuge &eacute; de qual igreja?:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['igrejaconjuge']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Filhos:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['filhos']);?></b></td></tr>

<!-- dados profissionais -->
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#ccc; border-top:5px solid #fff;"><p style=" font-size:14px; color:#222; font-size:20px;">Informa&ccedil;&otilde;es Profissionais</p></th></tr>

<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Profiss&atilde;o:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['profissao']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Empresa que trabalha:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['empresa']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Telefone Comercial:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['telcomercial']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Endere&ccedil;o da empresa:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['enderecoempresa']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">RG:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['identidade']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">CPF:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['cpf']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Grau de Instru&ccedil;&atilde;o:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($grau1['categoria']);?></b></td></tr>

<!-- Informações de Contato -->
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#ccc; border-top:5px solid #fff;"><p style=" font-size:14px; color:#222; font-size:20px;">Informa&ccedil;&otilde;es de contato</p></th></tr>

<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Endere&ccedil;o:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['endereco']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">CEP:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['cep']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Bairro:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['bairro']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Cidade:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['cidade']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Estado:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['estado']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Telefone:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['telefone']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Celular:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['celular']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">E-mail:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['email']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Twitter:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['twitter']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Facebook:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['facebook']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Orkut:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['orkut']);?></b></td></tr>

<!-- Informações Religiosas -->
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#ccc; border-top:5px solid #fff;"><p style=" font-size:14px; color:#222; font-size:20px;">Informa&ccedil;&otilde;es Religiosas</p></th></tr>

<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Data de Profiss&atilde;o de F&eacute;:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['datafe1']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Data do Batismo:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['databatismo1']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Igreja em que foi batizado:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['igrejabatismo']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Cidade da Igreja:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['cidadeigreja']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Estado da Igreja:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['estadoigreja']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Pastor que batizou:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['pastorbatismo']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Data que chegou na igreja:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['dataentrou1']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Modo como entrou na igreja:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['modocomoentrou']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">M&uacute;sica Preferida:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['musicapreferida']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Texto B&iacute;blico preferido:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($dados['bibliapreferida']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">&Eacute; dizimista?:</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dizimista1['categoria']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Faz parte de qual minist&eacute;rio?:</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($ministerio1['categoria']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Qual &eacute; o seu talento?</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($dados['talentos']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Qual o seu cargo na igreja?</th><td style=" font-size:14px; color:#000!important; padding:5px 10px;"><b><?=utf8_decode($cargo1['categoria']);?></b></td></tr>
<tr><th style=" font-size:14px; padding:5px 10px; width:200px; background:#EAEAEA; border-top:5px solid #fff;">Onde gostaria de trabalhar na igreja?</th><td style=" font-size:14px; background:#f4f4f4; padding:5px 10px;  border-top:6px solid #fff;  border-bottom:4px solid #fff; color:#000!important; font-size:14px!important;"><b><?=utf8_decode($gostariarabalhar1['categoria']);?></b></td></tr>
 
</table>

</div>

<? } ?>