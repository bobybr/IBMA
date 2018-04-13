<? 
	define('ID_MODULO',1,true);
	include('../includes/Config.php');
	include('../includes/Topo.php');
 

	$Config = array(
		'arquivo'=>'noticias',
		'tabela'=>'tbnoticias',
		'titulo'=>'titulo',
		'id'=>'id_noticia',
		'urlfixo'=>'', 
		'pasta'=>'noticias',
	);


	if ($_GET['ID']>0) $dados = db_dados("SELECT * FROM ".$Config['tabela']." WHERE ".$Config['id']."=".(int)$_GET['ID']." LIMIT 1;");
	$dados['titulo']=str_replace('\\','',$dados['titulo']);
	$dados['texto']=str_replace('\\','',$dados['texto']);

?>
<?
include('../includes/Mensagem.php');
$ondeestou = 'Nova Notícia';
?>
                	<div class="conthead">
                        <h2>Adicionar Notícia</h2>
                    </div>
<div id="conteudo">
<?
 

	# Categoria
	$Categoria=array();
	$tmp1s = db_consulta("SELECT * FROM tbnoticias_categorias ORDER BY categoria ASC");
	while ($tmp1 = db_lista($tmp1s)) {
		$Categoria[$tmp1['categoria']]=$tmp1['id_categoria'];
	}


	# Montando os Dados
	$campos = array(
		#	0=>Tipo			1=>Titulo		2=>Nome Campo		3=>Tamanho(px)	4=>CampoExtra		5=>Comentário								6=>Atributos
		array('select',		'Categorias',	'id_categoria',		'150',			$Categoria,			'',											''),
		array('text',		'Título',		'titulo',			'500',			'',					'',											''),
		array('text',		'Subítulo',		'subtitulo',			'500',			'',					'',											''),
		array('text',		'Créditos',		'creditos',			'500',			'',					'',											''),
		array('file',		'Imagem',		'imagem',			'350',			0,					'',											''),
		array('textarea',	'Texto',		'texto',			'',	            '',					'',											''),
	);


	# Exibindo os campos
	echo adminCampos($campos,$Config,$dados);






?>
</div>
<?
	include('../includes/Rodape.php');
?>