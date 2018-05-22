<?

if ($_GET['id']>0) {
	$busca = " AND id_video=".(int)$_GET['id'];
} else if ($_GET['categoria']>0) {
	$busca = " AND tbvideos.id_categoria=".(int)$_GET['categoria'];
}

$dados = db_dados("
	SELECT 
		tbvideos.*,
		DATE_FORMAT(tbvideos.data,'%d/%m/%Y às %H:%i')  as data1 ,
		tbvideos_categorias.*
	FROM 
		tbvideos
		INNER JOIN tbvideos_categorias ON (tbvideos_categorias.id_categoria = tbvideos.id_categoria)
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
	
	
<!-- Interna -->	
   
<div class="acessibilidade">
	/ <?=utf8_decode($dados['categoria']);?> / <?=utf8_decode($dados['titulo']);?> 
</div>
<div class="interna">


<div style="margin:10px 0 0 0; color:#999; font-size:12px;"><?=$dados['data1'];?> por <?=utf8_decode($dados['categoria']);?></div>
<div class="titInterna" style="margin-top:0;"><?=utf8_decode($dados['titulo']);?></div>
	
    
<div class="conteudo">
	
<div style="font-size:11px; color:#aaa;">créditos: <?=utf8_decode($dados['creditos']);?></div>
		
<div class='imginterna'>
	<? if (strlen($dados['video'])>0) { ?>
	<iframe width="620" height="420" src="http://www.youtube.com/embed/<?=utf8_decode($dados['video']);?>" frameborder="0" allowfullscreen></iframe>
	<? } ?>
</div>

<div id="texto">
<?=utf8_decode($dados['descricao']);?>
</div>

<br><br>

<div class="limpar"></div>
<div style=" font-size:16px; color:#555; padding:10px 0 0 0; border-top:5px solid #f4f4f4; letter-spacing:-0.05em; font-weight:bold; margin:0 0 20px 0;">Veja também:</div>
<div class="limpar"></div>


	<div class='colunac3binterna'>
<?
$i=0;
$SQL = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as data1 FROM tbvideos WHERE id_categoria=".utf8_decode($dados['id_categoria'])." AND id_video NOT LIKE ".utf8_decode($dados['id_video'])." ORDER BY id_video DESC";
$Lista = new Consulta($SQL,3,$PGATUAL);
while ($linha = db_lista($Lista->consulta)) { $i++;
?>
	<div class='colunac3b'>
	<a href="<?=utf8_decode($dadosconfig['url']);?>/videos_ver/<?=utf8_decode($linha['id_video']);?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html"><span class="playicon"><img src="<?=utf8_decode($dadosconfig['url']);?>/img/play_icone.png" /></span></a>
<?
$url = "http://www.youtube.com/watch?v=".utf8_decode($linha['video']);?><?
echo "<div class='imglaranja'><a href='".utf8_decode($dadosconfig['url'])."/videos_ver/".utf8_decode($linha['id_video'])."/".retiraAcentos(nomeArquivo($linha['titulo'])).".html'><img src='".video_imagem($url)."' width='120px' height='90px'/></a></div>";
?>
	<p><span class="categoriadep"><?=utf8_decode($linha['data1']);?></span><a href='<?=utf8_decode($dadosconfig['url']);?>/videos_ver/<?=utf8_decode($linha['id_video']);?>/<?=retiraAcentos(nomeArquivo($linha['titulo']));?>.html'><?=utf8_decode($linha['titulo']);?>.  </a></p>
	</div>
<?
}
?>
	</div>
	
	
	
	
	

<div class="limpar"></div>
<div style=" font-size:16px; color:#555; padding:10px 0 0 0; border-top:5px solid #f4f4f4; letter-spacing:-0.05em; font-weight:bold; margin:0 0 20px 0;">Espalhe por aí <img src="<?=utf8_decode($dadosconfig['url']);?>/img/espalhe.png" /></div>
<div class="limpar"></div>

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_preferred_5"></a>
<a class="addthis_button_preferred_6"></a>
<a class="addthis_button_preferred_7"></a>
<a class="addthis_button_preferred_8"></a>
<a class="addthis_button_preferred_9"></a>
<a class="addthis_button_preferred_10"></a>
<a class="addthis_button_preferred_11"></a>
<a class="addthis_button_preferred_12"></a>
<a class="addthis_button_preferred_13"></a>
<a class="addthis_button_preferred_14"></a>
<a class="addthis_button_preferred_15"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e4bc82150099580"></script>
<!-- AddThis Button END -->

<br><br>

<div class="limpar"></div>

 

  
</div>

</div>

</div>




