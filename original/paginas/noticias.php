<? if ($_GET['id']>0) {
	$busca = " AND id_noticia=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbnoticias.id_categoria=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT 
		tbnoticias.*,
		DATE_FORMAT(tbnoticias.data,'%d/%m/%Y')  as data1 ,
		tbnoticias_categorias.*
	FROM 
		tbnoticias
		INNER JOIN tbnoticias_categorias ON (tbnoticias_categorias.id_categoria = tbnoticias.id_categoria)
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

<div class="titInterna" style="margin-top:0;"><span style="color:#ccc;">Notícias:</span> <?=utf8_decode($dados['categoria']);?></div>	
 
<div class='colunac3binterna'>
<?

if ($_GET['id']>0) {
	$busca = " AND id_noticia=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbnoticias.id_categoria=".(int)$_GET['categoria'];
}

$i=0;
$SQL = " SELECT
		tbnoticias.*,
		DATE_FORMAT(tbnoticias.data,'%d/%m/%Y')  as data1 ,
		tbnoticias_categorias.*
	FROM 
		tbnoticias
		INNER JOIN tbnoticias_categorias ON (tbnoticias_categorias.id_categoria = tbnoticias.id_categoria)
	WHERE 1
		".$busca."
	ORDER BY 
		data DESC
		";
	$Lista = new Consulta($SQL,20,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
	
?>

    <div class='colunac3binterna'>
	
	<? if (strlen($linha['imagem'])>0)  { ?>  
        	<div class='imglaranja'><a href="<?=utf8_decode($dadosconfig['url']);?>/noticias_ver/<?=$linha['id_noticia'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/noticias/<?=$linha['imagem'];?>&x=120&y=90&corta=1"/></a></div>
    <? } else { ?> <div class='imglaranja'><a href="<?=utf8_decode($dadosconfig['url']);?>/noticias_ver/<?=$linha['id_noticia'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=img/sem_foto.png&x=120&y=90&corta=1"/></a></div> <? } ?>
	
	<p><span class="categoriadep"><?=utf8_decode($linha['data1']);?></span><br><a href="<?=utf8_decode($dadosconfig['url']);?>/noticias_ver/<?=$linha['id_noticia'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><?=utf8_decode($linha['titulo']);?> </a> </p> 
	</div>
 
<?
}
?>
	</div>
	
		<!-- Resetar formatação -->	
	<div class='limpar'></div>
	
	<br><br>
<div class="paginacao"><?=$Lista->geraPaginacao();?></div>

 
	
	<!-- Resetar formatação -->	
	<div class='limpar'></div>

	
  
</div>