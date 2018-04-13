<? if ($_GET['id']>0) {
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

?>

<div id='colunameio'>
	
<div class="acessibilidade">
	/ <?=utf8_decode($dados['categoria']);?>
</div>

<div class="titInterna" style="margin-top:0;"><span style="color:#ccc;">Departamento:</span> <?=utf8_decode($dados['categoria']);?></div>	

 

<?

if ($_GET['id']>0) {
	$busca = " AND id_departamentos=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbdepartamentos.id_categoria=".(int)$_GET['categoria'];
}

$i=0;
$SQL = " SELECT
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
		";
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
	
?>

    <div class='colunac3ainterna'>
	<div class='imgverde'><a href="<?=utf8_decode($dadosconfig['url']);?>/departamentos_ver/<?=$linha['id_departamentos'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/departamentos/<?=$linha['codigo'];?>/capa.jpg&x=120&y=90&corta=1"/></a></div>
	<p><span class="categoriadep"><?=utf8_decode($linha['data1']);?></span><br><a href="<?=utf8_decode($dadosconfig['url']);?>/departamentos_ver/<?=$linha['id_departamentos'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><?=utf8_decode($linha['titulo']);?> </a> </p> 
	</div>
 
<?
}
?>

<div class="paginacao"><?=$Lista->geraPaginacao();?></div>

 
	
	<!-- Resetar formatação -->	
	<div class='limpar'></div>

	
  
</div>