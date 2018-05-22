<? 
	define('ID_MODULO',999,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'configuracoes',
		'tabela'=>'tbconfiguracoes',
		'titulo'=>'titulo',
		'id'=>'id_config',
		'urlfixo'=>'', 
		'pasta'=>'configuracoes',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");

?>
<?
include('../includes/Mensagem.php');
?>
                	<div class="conthead">
                        <h2>Configurações gerais do site</h2>
                    </div>
<div id="conteudo">
<?

 

if ($dados['corsite']=='') $dados['corsite']='azul';

	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>ComentÃ¡rio								6=>Atributos
		array('text',		'Nome da igreja',		'nomesite',			'255',			'',					'',											''),
		array('text',		'Slogan',		'slogansite',			'255',			'',					'',											''),
		array('text',		'Email',		'emailsite',			'255',			'',					'',											''),
        
                array('text',		'Pagseguro',		'pagseguro',			'255',			'',					'',											''),
		array('text',		'Token',		'token',			'255',			'',					'',											''),
		array('text',		'Twitter',		'twitter',			'255',			'',					'',											''),
		array('text',		'Facebook',		'facebook',			'255',			'',					'',											''),
		array('text',		'Youtube',		'youtube',			'255',			'',					'',											''),

		array('file',		'Logomarca',		'imagem',			'350',			0,					'',											''),
		array('text',	'Produto 1',	'telefone1',		'255',	'',					' Url link, ',											''),
		
		array('text',	'Produto 2',	'telefone2',		'255',	'',					' Url link',											''),
		
		array('text',	'Banner topo',	'telefone3',		'255',	'',					' Url link',											''),
		
		array('text',	'Banner lateral',	'produtoservico',		'255',	'',					' Url link',											''),
		
		array('textarea',	'Rodape',	'endereco',		array(80,10),	'',					'',											''),
		
		array('text',		'Cor do site',		'corsite',		'100',			'',					' Deixe sempre azul',											''),
  		array('text',		'URL do site',		'url',		'350',			'',					'',											''),
	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>
