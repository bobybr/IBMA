
<?
	list($buscado,) = pesquisaQuery(array('teste'),$_GET['busca']);
?>
 
<div id='colunameio'>
<div class="acessibilidade">
	/ Busca por &quot;<?=trim($buscado);?>&quot;
</div>
 

		<div class="titInterna" style="margin-top:0; color:orange;">Departamentos</div>
        <ul>
<?
	$busca = '';
	if (strlen($_GET['busca'])>0) {
		list($buscado,$tmp) = pesquisaQuery(array('titulo'),utf8_encode($_GET['busca']));
		$busca .= $tmp;

	}
	$consulta = db_consulta("
		SELECT 
			tbdepartamentos.*,
			DATE_FORMAT(tbdepartamentos.data,'%d/%m/%Y') as data1
		FROM 
			tbdepartamentos
		WHERE 1
			".$busca."
		ORDER BY data DESC
		LIMIT 30
		");

	if (db_linhas($consulta)>0) {
	while ($linha = db_lista($consulta)) {
?>
	<li>
    	<span><?=$linha['data1'];?></span>
        <b><a href="<?=utf8_decode($dadosconfig['url']);?>/departamentos_ver/<?=$linha['id_departamentos'];?>"><?=utf8_decode($linha['titulo']);?></a></b>
	</li>
<?
	}
	} else {
	
		echo '<li>Nenhum registro encontrado.</li>';
	
	}

?>
		</ul>









<br><br>



		<div class="titInterna" style="margin-top:0; color:#690;">Notícias</div>
        <ul>
<?
	$busca = '';
	if (strlen($_GET['busca'])>0) {
		list($buscado,$tmp) = pesquisaQuery(array('titulo'),utf8_encode($_GET['busca']));
		$busca .= $tmp;

	}
	$consulta = db_consulta("
		SELECT 
			tbnoticias.*,
			DATE_FORMAT(tbnoticias.data,'%d/%m/%Y') as data1
		FROM 
			tbnoticias
		WHERE 1
			".$busca."
		ORDER BY data DESC
		LIMIT 30
		");

	if (db_linhas($consulta)>0) {
	while ($linha = db_lista($consulta)) {
?>
	<li>
    	<span><?=$linha['data1'];?></span>
       <b> <a href="<?=utf8_decode($dadosconfig['url']);?>/noticias_ver/<?=$linha['id_noticia'];?>"><?=utf8_decode($linha['titulo']);?></a></b>
	</li>
<?
	}
	} else {
	
		echo '<li>Nenhum registro encontrado.</li>';
	
	}

?>
		</ul>









<br><br>


		<div class="titInterna" style="margin-top:0; color:#09c;">Galerias</div>
        <ul>
<?
	$busca = '';
	if (strlen($_GET['busca'])>0) {
		list($buscado,$tmp) = pesquisaQuery(array('titulo'),utf8_encode($_GET['busca']));
		$busca .= $tmp;

	}
	$consulta = db_consulta("
		SELECT 
			tbgalerias.*,
			DATE_FORMAT(tbgalerias.data,'%d/%m/%Y') as data1
		FROM 
			tbgalerias
		WHERE 1
			".$busca."
		ORDER BY data DESC
		LIMIT 30
		");

	if (db_linhas($consulta)>0) {
	while ($linha = db_lista($consulta)) {
?>
	<li>
    	<span><?=$linha['data1'];?></span>
        <b><a href="<?=utf8_decode($dadosconfig['url']);?>/galerias_ver/<?=$linha['id_galeria'];?>"><?=utf8_decode($linha['titulo']);?></a></b>
	</li>
<?
	}
	} else {
	
		echo '<li>Nenhum registro encontrado.</li>';
	
	}

?>
		</ul>
		
		
		
		
<br><br>


		<div class="titInterna" style="margin-top:0; color:orange;">Vídeos</div>
        <ul>
<?
	$busca = '';
	if (strlen($_GET['busca'])>0) {
		list($buscado,$tmp) = pesquisaQuery(array('titulo'),utf8_encode($_GET['busca']));
		$busca .= $tmp;

	}
	$consulta = db_consulta("
		SELECT 
			tbvideos.*,
			DATE_FORMAT(tbvideos.data,'%d/%m/%Y') as data1
		FROM 
			tbvideos
		WHERE 1
			".$busca."
		ORDER BY data DESC
		LIMIT 30
		");

	if (db_linhas($consulta)>0) {
	while ($linha = db_lista($consulta)) {
?>
	<li>
    	<span><?=$linha['data1'];?></span>
        <b><a href="<?=utf8_decode($dadosconfig['url']);?>/videos_ver/<?=$linha['id_video'];?>"><?=utf8_decode($linha['titulo']);?></a></b>
	</li>
<?
	}
	} else {
	
		echo '<li>Nenhum registro encontrado.</li>';
	
	}

?>
		</ul>
		
		
		
</div>
