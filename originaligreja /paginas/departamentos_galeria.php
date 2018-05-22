 <? 
	include ('../includes/BancoDeDados.php'); 
	include ('../includes/Funcoes.php'); 
	include ('../includes/Config.php'); 
	include ('../includes/Imagens.php'); 
	include ('../includes/Validacoes.php'); 
?>
<?
# Configurações
$dadosconfig = db_dados( "SELECT * FROM tbconfiguracoes WHERE id_config=1")
?>
<?

if ($_GET['id']>0) {
	$busca = " AND id_departamentos=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbdepartamentos.id_categoria=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT 
		tbdepartamentos.*,
		DATE_FORMAT(tbdepartamentos.data,'%d/%m/%Y')  as data1 ,
		tbdepartamentos_categorias.*
	FROM 
		tbdepartamentos
		INNER JOIN tbdepartamentos_categorias ON (tbdepartamentos_categorias.id_categoria = tbdepartamentos.id_categoria)
	WHERE 1
		".$busca."
	ORDER BY 
		data DESC
	LIMIT 1;
		");
	$dados['titulo']=str_replace('\\','',$dados['titulo']);
	$dados['texto']=str_replace('\\','',$dados['texto']);
	
	db_consulta('UPDATE tbdepartamentos SET contador=contador+1 WHERE id_departamentos='.(int)$dados['id_departamentos']." LIMIT 1");
	
?>

		<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js"></script>
		<link type="text/css" href="../galeria/styles/bottom.css" rel="stylesheet" />
		<script type="text/javascript" src="../galeria/lib/jquery.pikachoose.js"></script>
		<script language="javascript">
			$(document).ready(
				function (){
					$("#pikame").PikaChoose({carousel:true});
				});
		</script>
		
		
<div>
<div class="pikachoose">
	<ul id="pikame" class="jcarousel-skin-pika">
	
<?
  	$fotos = db_consulta("SELECT * FROM tbdepartamentos_fotos WHERE 1 ".$busca." ORDER BY posicao ASC;");
	$i=0;
	if (db_linhas($fotos)>0) {
	while ($foto = db_lista($fotos)) { $i++;
?>
		<li><a href=" "><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?x=660&y=373&corta=0&img=arquivos/departamentos/<?=$dados['codigo'];?>/fotos/<?=$foto['imagem'];?>"></a><span></span></li>
	
<?
if (($i%7)==0) echo '<br>';
}
?>
  
<?
} else echo '';
?>

	</ul>
</div>
</div>

<div class="limpar"></div>