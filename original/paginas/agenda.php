<? if ($_GET['id']>0) {
	$busca = " AND id_agenda=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND id_agenda=".(int)$_GET['id'];
}

$dados = db_dados("
	SELECT 
		tbagenda.*,
		DATE_FORMAT(tbagenda.data,'%d/%m/%Y')  as data1 
	FROM 
		tbagenda
 
	WHERE 1
		".$busca."
	ORDER BY 
		data DESC
	LIMIT 100;
		");
	$dados['titulo']=str_replace('\\','',$dados['titulo']);
	$dados['texto']=str_replace('\\','',$dados['texto']);

?>

<div id='colunameio'>
	
<div class="acessibilidade">
	/ Agenda
</div>

<div class="titInterna" style="margin-top:0;"><span style="color:#ccc;">Agenda</span> </div>	
 
<div class='colunac3binterna'>
<?

if ($_GET['id']>0) {
	$busca = " AND id_agenda=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND id_agenda=".(int)$_GET['id'];
}

$i=0;
$SQL = " SELECT
		tbagenda.*,
		DATE_FORMAT(tbagenda.data,'%d/%m/%Y')  as data1  
	FROM 
		tbagenda
 
	WHERE 1
		".$busca."
	ORDER BY 
		data DESC
		";
	$Lista = new Consulta($SQL,30,$PGATUAL);
	while ($linha = db_lista($Lista->consulta)) { $i++;
	
?>

    <div class='colunac3binterna'>
	
	<? if (strlen($linha['imagem'])>0)  { ?>  
        	<div class='imglaranja'><a href="<?=utf8_decode($dadosconfig['url']);?>/agenda_ver/<?=$linha['id_agenda'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=arquivos/agenda/<?=$linha['imagem'];?>&x=120&y=90&corta=1"/></a></div>
    <? } else { ?> <div class='imglaranja'><a href="agenda_ver/<?=$linha['id_agenda'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><img src="<?=utf8_decode($dadosconfig['url']);?>/img.php?img=img/sem_foto.png&x=120&y=90&corta=1"/></a></div> <? } ?>
	
	<p><span class="categoriadep"><?=utf8_decode($linha['data1']);?></span><br><a href="<?=utf8_decode($dadosconfig['url']);?>/agenda_ver/<?=$linha['id_agenda'];?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><?=utf8_decode($linha['titulo']);?> </a>  <br> <span class="categoriadep"><?=strip_tags(utf8_decode($linha['descricao']));?></span> </p> 
	</div>
 
<?
}
?>
	</div>
	
		<!-- Resetar formatação -->	
	<div class='limpar'></div>
	
	<br><br>


 
	
	<!-- Resetar formatação -->	
	<div class='limpar'></div>

	
  
</div>